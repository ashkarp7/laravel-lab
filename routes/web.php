<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Models\Student;

// Home page
Route::get('/', function () {
    return view('home');
});

// A – Display name
Route::get('/hello/{your_name}', function ($your_name) {
    return "Hello " . $your_name;
});

// A – About page using controller
Route::get('/about', [PageController::class, 'about']);

// B – Resource controller
Route::resource('students', StudentController::class);

// C – Explicit route model binding
Route::get('/roll/{your_roll}', function (Student $your_roll) {
    return view('students.show', ['student' => $your_roll]);
});