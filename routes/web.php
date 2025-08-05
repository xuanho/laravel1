<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    // dispatch(function(){
    //     logger('hello from queue');
    // })->delay(5);
    $job = Job::first();
    TranslateJob::dispatch($job);
    return 'Done';
})->name('test');

Route::view('/', 'home')->name('home');
// Route::controller(JobController::class)->group(function () {
//     // index page
//     Route::get('/jobs', 'index');
//     // create page
//     Route::get('/jobs/create', 'create');
//     // show page
//     Route::get('/jobs/{job}', 'show');
//     // store job
//     Route::post('/jobs', 'store');
//     // edit job
//     Route::get('/jobs/{job}/edit', 'edit');
//     // update page
//     Route::patch('/jobs/{job}', 'update');
//     // delete job
//     Route::delete('/jobs/{job}', 'destroy');
// });
// // create page
Route::get('/jobs/create', [JobController::class, 'create']);
// index page
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
// show page
Route::get('/jobs/{job}', [JobController::class, 'show']);
// store job
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
// edit job
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth','can:edit-job,job']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
        ->middleware('auth')
        ->can('edit', 'job');
// update page
Route::patch('/jobs/{job}', [JobController::class, 'update']);
// delete job
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

// Route::resource('jobs', JobController::class)->middleware('auth');

Route::view('/contact', 'contact')->name('contact');
Route::controller(RegisterUserController::class)->group(function(){
    Route::get('/register','create')->name('register');
    Route::post('/register','store')->name('register.store');
});
Route::controller(SessionController::class)->group(function(){
    Route::get('/login','create')->name('login');
    Route::post('/login','store')->name('login.store');
});
Route::post('/login', [SessionController::class, 'store'])->name('login.store')->middleware(['guest']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');