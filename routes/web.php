<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Http\Request;

// public pages
Route::get('/', function () { return view('home'); });
Route::get('/about', function () { return view('about'); });
Route::get('/portfolio', [ProjectController::class, 'index'])->name('portfolio.index');
Route::get('/contact', function () { return view('contact'); });
Route::post('/contact/send', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:150',
        'message' => 'required|string|max:2000',
    ]);
    $entry = "[" . now() . "] Name: {$data['name']} | Email: {$data['email']} | Message: " . str_replace(["\r","\n"], ['',' '], $data['message']) . PHP_EOL;
    $logfile = storage_path('logs/contact.log');
    file_put_contents($logfile, $entry, FILE_APPEND | LOCK_EX);
    return redirect('/contact')->with('success', 'Thanks — your message has been received.');
});

// Admin auth
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Protected admin project routes (uses admin.auth middleware)
Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin/projects', [ProjectController::class, 'adminIndex'])->name('admin.projects.index');
    Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/admin/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
});
