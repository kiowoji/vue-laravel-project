<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminOnly;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'courses' => \App\Models\Course::all(),
    ]);
})->name('welcome');

Route::get('/about', function () {
    return Inertia::render('AboutPage');
})->name('about');

Route::get('/search', [CourseController::class, 'searchCourses'])->name('search');

Route::get('/courses', [CourseController::class, 'showCoursesPage'])->name('courses');

Route::get('/courses/view/{id}', [CourseController::class, 'viewCourse'])->name('courses.view.course');


Route::get('/courses/get', [CourseController::class, 'getCourses'])->name('courses.get');

Route::get('/contact', function () {
    return Inertia::render('ContactPage');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Add Course to Favourites
    Route::post('/courses/favourite/add', [CourseController::class, 'addCourseToFavourite'])->name('courses.favourite.add');
    //Show Favourite Courses
    Route::get('/courses/favourite', [CourseController::class, 'showFavouriteCourses'])->name('courses.favourite.show');
});

Route::middleware([AdminOnly::class, 'auth'])->group(function () {
    Route::get('/course-upload', function () {
        return Inertia::render('CourseUpload');
    })->name('course-upload');
    Route::post('/course-upload', [CourseController::class, 'store'])->name('course.store');
});

require __DIR__ . '/auth.php';
