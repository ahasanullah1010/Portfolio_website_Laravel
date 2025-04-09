<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactMessageApiController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\ProjectApiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SkillApiController;
use Illuminate\Support\Facades\Response;




Route::get('/', function () {
    return view('home');
});



// User registration system 
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

// user login and authentication system
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// skills routes
Route::get('/skills', function () {
    return view('pages.skills');
});
Route::get('/create/skill', function () {
    return view('pages.skill_create');
});


// skills api routes
Route::get('/api/skills', [SkillApiController::class, 'index']);    // Get all skills
Route::post('/api/skills', [SkillApiController::class, 'store']);   // Create a skill
Route::get('/api/skills/{id}', [SkillApiController::class, 'show']); // Get a single skill
Route::put('/api/skills/{id}', [SkillApiController::class, 'update']); // Update a skill
Route::delete('/api/skills/{id}', [SkillApiController::class, 'destroy']); // Delete a skill


// Project api routes
Route::get('/api/projects', [ProjectApiController::class, 'index']);
Route::post('/api/projects', [ProjectApiController::class, 'store']);
Route::get('/api/projects/{id}', [ProjectApiController::class, 'show']);
Route::put('/api/projects/{id}', [ProjectApiController::class, 'update']);
Route::delete('api//projects/{id}', [ProjectApiController::class, 'destroy']);


// project create form
Route::get('/project/create', function () {
    return view('projects.create');
});

// project page view
Route::get('/projects', function () {
    return view('projects.index');
});








// blog api 
Route::get('/blogs', [BlogApiController::class, 'index']);    // Get all blogs
Route::post('/blogs', [BlogApiController::class, 'store']);   // Create a blog
Route::get('/blogs/{id}', [BlogApiController::class, 'show']); // Get a single blog
Route::put('/blogs/{id}', [BlogApiController::class, 'update']); // Update a blog
Route::delete('/blogs/{id}', [BlogApiController::class, 'destroy']); // Delete a blog




// ContactMessageApi 
Route::get('/contact-messages', [ContactMessageApiController::class, 'index']);    // Get all messages
Route::post('/contact-messages', [ContactMessageApiController::class, 'store']);   // Create a new message
Route::get('/contact-messages/{id}', [ContactMessageApiController::class, 'show']); // Get a single message
Route::delete('/contact-messages/{id}', [ContactMessageApiController::class, 'destroy']); // Delete a message


 // contact
Route::get('/contact', function () {
    return view('contact.contact');
})->name('contact');

Route::post('/contact', [ContactMessageApiController::class, 'store'])->name('contact.store');






 // about me 
 Route::get('/about-me', function () {
    return view('about.about');
})->name('contact');



 // resume
 Route::get('/my-resume', function () {
    return view('pages.resume');
});


// Route for Resume Download:

    use Illuminate\Support\Facades\File;
    
    Route::get('/download-resume', function () {
        $filePath = public_path('resume/resume.pdf');
    
        if (!File::exists($filePath)) {
            abort(404, 'Resume not found.');
        }
    
        return Response::download($filePath, 'Ahasan_Ullah_Resume.pdf');
    });
    