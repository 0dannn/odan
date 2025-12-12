<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    // Public portfolio listing
    public function index()
    {
        $projects = Project::orderBy('created_at','desc')->get();
        return view('portfolio', compact('projects'));
    }

    // ADMIN: list projects
    public function adminIndex()
    {
        $projects = Project::orderBy('created_at','desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    // ADMIN: show create form
    public function create()
    {
        return view('admin.projects.create');
    }

    // ADMIN: store new project
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'image' => 'nullable|image|max:2048', // 2MB
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('projects'), $filename);
            $data['image'] = $filename;
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project added.');
    }

    // ADMIN: edit form
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    // ADMIN: update project
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // delete old image
            if ($project->image && File::exists(public_path('projects/' . $project->image))) {
                File::delete(public_path('projects/' . $project->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('projects'), $filename);
            $data['image'] = $filename;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated.');
    }

    // ADMIN: delete project
    public function destroy(Project $project)
    {
        if ($project->image && File::exists(public_path('projects/' . $project->image))) {
            File::delete(public_path('projects/' . $project->image));
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }
}
