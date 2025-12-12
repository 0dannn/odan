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
        $projects = Project::orderBy('created_at', 'desc')->get();
        $featuredProjects = Project::orderBy('created_at', 'desc')->take(6)->get();
        return view('portfolio', compact('projects', 'featuredProjects'));
    }

    // ADMIN: list projects
    public function adminIndex()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
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
            $data['image'] = $this->handleImageUpload($request->file('image'));
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Course created successfully!');
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
            $this->deleteImage($project->image);
            $data['image'] = $this->handleImageUpload($request->file('image'));
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Course updated successfully!');
    }

    // ADMIN: delete project
    public function destroy(Project $project)
    {
        $this->deleteImage($project->image);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Course deleted successfully!');
    }

    /**
     * Handle image upload and return filename
     */
    private function handleImageUpload($file)
    {
        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('projects'), $filename);
        return $filename;
    }

    /**
     * Delete image file if it exists
     */
    private function deleteImage($imageName)
    {
        if ($imageName && File::exists(public_path('projects/' . $imageName))) {
            File::delete(public_path('projects/' . $imageName));
        }
    }

    /**
     * Show enrollment page
     */
    public function enroll($id = null)
    {
        $project = null;
        if ($id) {
            $project = Project::find($id);
        } elseif (request()->has('course')) {
            // Handle course name from query parameter
            $courseName = request()->get('course');
            // You could find by name if needed, but for now we'll just pass it
        }
        return view('enroll', compact('project'));
    }

    /**
     * Process enrollment
     */
    public function processEnrollment(Request $request)
    {
        $data = $request->validate([
            'course_id' => 'nullable|exists:projects,id',
            'course_name' => 'required|string|max:191',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:20',
            'payment_method' => 'required|in:card,paypal,bank,dana',
            'amount' => 'nullable|numeric|min:0',
        ]);

        // Store enrollment in session for payment processing
        session(['pending_enrollment' => $data]);

        // If Dana payment, redirect to Dana payment page
        if ($data['payment_method'] === 'dana') {
            $amount = $request->input('amount', 99); // Get amount from request or default
            return redirect()->route('payment.dana')->with('amount', $amount);
        }

        // For other payment methods, log and redirect to success
        $entry = "[" . now() . "] ENROLLMENT | Course: {$data['course_name']} | Name: {$data['name']} | Email: {$data['email']} | Phone: " . ($data['phone'] ?? 'N/A') . " | Payment: {$data['payment_method']}" . PHP_EOL;
        $logfile = storage_path('logs/enrollments.log');
        file_put_contents($logfile, $entry, FILE_APPEND | LOCK_EX);

        return redirect()->route('enroll.success')->with('enrollment', $data);
    }

    /**
     * Show enrollment success page
     */
    public function enrollmentSuccess()
    {
        $enrollment = session('enrollment');
        return view('enroll-success', compact('enrollment'));
    }
}
