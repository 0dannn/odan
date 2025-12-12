<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'password' => 'required|string',
        ]);

        $adminPassword = env('ADMIN_PASSWORD');

        if ($data['password'] === $adminPassword && !empty($adminPassword)) {
            // mark session as admin
            $request->session()->put('is_admin', true);

            // redirect to intended admin page
            $intended = $request->session()->pull('admin_intended', route('admin.dashboard'));
            return redirect()->to($intended)->with('success', 'Logged in as admin.');
        }

        return back()->withErrors(['password' => 'Invalid password'])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_admin');
        return redirect('/')->with('success', 'Logged out.');
    }
}
