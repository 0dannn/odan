<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Http\Request;

// public pages
Route::get('/', function () {
    $featuredProjects = \App\Models\Project::orderBy('created_at', 'desc')->take(3)->get();
    return view('home', compact('featuredProjects'));
});
Route::get('/about', function () { return view('about'); });
Route::get('/portfolio', [ProjectController::class, 'index'])->name('portfolio.index');
Route::get('/contact', function () { return view('contact'); });
Route::post('/contact/send', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:150',
        'phone' => 'nullable|string|max:20',
        'subject' => 'nullable|string|max:100',
        'message' => 'required|string|max:2000',
    ]);
    $subject = $data['subject'] ?? 'General Inquiry';
    $phone = $data['phone'] ?? 'N/A';
    $entry = "[" . now() . "] Subject: {$subject} | Name: {$data['name']} | Email: {$data['email']} | Phone: {$phone} | Message: " . str_replace(["\r", "\n"], ['', ' '], $data['message']) . PHP_EOL;
    $logfile = storage_path('logs/contact.log');
    file_put_contents($logfile, $entry, FILE_APPEND | LOCK_EX);
    return redirect('/contact')->with('success', 'Thank you for your message! We\'ll get back to you as soon as possible.');
});

// Enrollment routes
Route::get('/enroll', [ProjectController::class, 'enroll'])->name('enroll');
Route::get('/enroll/{id}', [ProjectController::class, 'enroll'])->name('enroll.course');
Route::post('/enroll/process', [ProjectController::class, 'processEnrollment'])->name('enroll.process');
Route::get('/enroll/success', [ProjectController::class, 'enrollmentSuccess'])->name('enroll.success');

// Payment routes
Route::get('/payment/dana', [App\Http\Controllers\PaymentController::class, 'showDanaPayment'])->name('payment.dana');
Route::post('/payment/dana/process', [App\Http\Controllers\PaymentController::class, 'processDanaPayment'])->name('payment.dana.process');
Route::post('/payment/dana/callback', [App\Http\Controllers\PaymentController::class, 'danaCallback'])->name('payment.dana.callback');
Route::get('/payment/success', [App\Http\Controllers\PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/failure', [App\Http\Controllers\PaymentController::class, 'paymentFailure'])->name('payment.failure');

// Admin auth
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Protected admin routes (uses admin.auth middleware)
Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/enrollments', [App\Http\Controllers\AdminController::class, 'enrollments'])->name('admin.enrollments');
    Route::get('/admin/payments', [App\Http\Controllers\AdminController::class, 'payments'])->name('admin.payments');
    Route::get('/admin/contacts', [App\Http\Controllers\AdminController::class, 'contacts'])->name('admin.contacts');
    Route::get('/admin/logs', [App\Http\Controllers\AdminController::class, 'logs'])->name('admin.logs');
    
    Route::get('/admin/projects', [ProjectController::class, 'adminIndex'])->name('admin.projects.index');
    Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/admin/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
});
