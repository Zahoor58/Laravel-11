<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;

// Home
Route::view('/', 'home');;

// Contact
Route::view('/contact', 'contact')->name('contact');

// Jobs
Route::resource('jobs', JobController::class);

// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index')->name('index');
//     Route::get('/jobs/create', 'create')->name('create');
//     Route::get("/jobs/{job}", "show")->name("show");
//     Route::post('jobs', 'store')->name('store');
//     Route::get("/jobs/{job}/edit", "edit")->name("edit");
//     Route::patch("/jobs/{job}", "update")->name("update");
//     Route::delete("/jobs/{job}", "destroy")->name("delete");
// });


// Route::resource('jobs', JobController::class,[
//     'except' => ['show']
// ]);
// Route::resource('jobs', JobController::class,[
//     'only' => ['show', 'show', 'edit', 'update']
// ]);
