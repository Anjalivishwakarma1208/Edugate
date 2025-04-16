<?php

use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SemesterMasterController;
use App\Http\Controllers\SubjectMasterController;
use App\Http\Controllers\SubjectPdfMasterController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\UserController;


// Home routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/aboutus', 'about');
    Route::get('/bca', 'bca');
    Route::get('/bscit', 'bscit');
    Route::get('/bscit1', 'bscit1');
    Route::get('/bscit2', 'bscit2');
    Route::get('/bscit3', 'bscit3');
    Route::get('/contactus', 'contact');
    Route::get('/mcq', 'mcq');
    Route::get('/videolec', 'videolec');
    Route::get('/imperativeprogramming', 'ipvl');
    Route::get('/ebook', 'ebooks');
    Route::get('/science', 'science');
});

// Course routes
Route::resource('courses', CourseController::class);
// Route::resource('courses.show', CourseController::class);
// Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
Route::put('courses/{course}', [CourseController::class, 'update'])->name('courses.update');
Route::resource('courses', CourseController::class);




// Semester routes
Route::controller(SemesterMasterController::class)->prefix('semester')->name('semester.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
    Route::put('/semester/{id}', [SemesterMasterController::class, 'update'])->name('semester.update');
    Route::put('semester/{id}', [SemesterMasterController::class, 'update'])->name('semester.update');
    Route::get('semester/{id}/edit', [SemesterMasterController::class, 'edit'])->name('semester.edit');
    Route::get('semester/{id}', [SemesterMasterController::class, 'show'])->name('semester.show');
});

// Subject routes
Route::controller(SubjectMasterController::class)->prefix('subject')->name('subject.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/getsemester', 'getsemester')->name('getsemester');
    Route::post('/', 'store')->name('store');

    // Unified show route
    Route::get('/{sub_id}', 'show')->name('show'); 

    // Edit routes
    Route::get('/{sub_id}/edit', 'edit')->name('edit');
    Route::post('/{sub_id}', 'update')->name('update');
    // Delete route
    Route::delete('/{sub_id}', 'destroy')->name('destroy');
    
    // Semester-related routes
    Route::get('/semester_list/{id}', 'get_semester_list')->name('semester_list'); 
    Route::get('/subject/{course_id}/{sub_id}', 'showSubjectDetails')->name('subject.list');

    Route::post('/get_semester_ajax', 'get_semester_ajax')->name('get_semester_ajax'); 
    // Route::get('/subject_pdfs/get-subjects', [SubjectPdfMasterController::class, 'getSubjects'])->name('subject_pdfs.get_subjects');
    // In routes/web.php
   Route::get('/subject/{id}/{semester_number}','get_subject_list')->name('subject_list');

});


// Subject PDFs routes
Route::controller(SubjectPdfMasterController::class)->prefix('subject_pdfs')->name('subject_pdfs.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/getsemester', 'getsemester')->name('getsemester');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
    Route::post('/getsubjects', 'get_subjects_by_ajax')->name('getsubjects');
    // In routes/web.php or routes/api.php
    Route::get('/subject/pdfs', [SubjectMasterController::class, 'getSubjectPdfsAjax'])->name('subject.get_subject_pdfs_ajax');
    Route::get('/subject_pdfs/get-semester', [SubjectPdfMasterController::class, 'getsemester'])->name('subject_pdfs.get_semester');
    Route::get('/subject_pdfs/get-subjects', [SubjectPdfMasterController::class, 'getSubjects'])->name('subject_pdfs.get_subjects');
    // Route::post('/get-semester', [SubjectPdfMasterController::class, 'get_semester_ajax'])->name('subject.get_semester_ajax');
    Route::post('/get-subjects', [SubjectPdfMasterController::class, 'getSubjects'])->name('subject.getSubjects');
    Route::get('/subjects', [SubjectPdfMasterController::class, 'getSubjects'])->name('subject.getSubjects');
    // Route for displaying subjects by course_id and semester_number


Route::get('/subject_pdfs/create', [SubjectPdfMasterController::class, 'create'])->name('subject_pdfs.create');

// Ensure the route for getting subjects is also defined if needed
Route::get('/subjects', [SubjectPdfMasterController::class, 'getSubjects'])->name('subject.getSubjects');
Route::get('/subject_pdfs/get-subjects', [SubjectPdfMasterController::class, 'getSubjects'])->name('subject_pdfs.get_subjects');
Route::get('/subject_pdfs/get-subjects-ajax', 'getSubjects')->name('subject_pdfs.get_subjects_ajax');
});

// Include admin routes
require __DIR__.'/admin.php';


// Routes for showing the login page and handling login
Route::get('login', [LoginController::class, 'showLoginPage'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('admin.login');

// Route for handling logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route to show the user login page
Route::get('user', [UserController::class, 'showLoginPage'])->name('user.user');
Route::post('user', [UserController::class, 'login'])->name('user.user');


// Route to handle user login submission
Route::post('user/login', [UserController::class, 'login'])->name('user.login.submit');
// Routes for User Registration
Route::get('register', [UserController::class, 'showRegisterPage'])->name('user.register');
Route::post('register', [UserController::class, 'register'])->name('user.register.post');

// Routes for Video Lectures
Route::resource('video-lectures', VideoController::class);
Route::resource('video', VideoController::class);
Route::get('/video', [VideoController::class, 'index'])->name('video.index');
Route::get('/video/create', [VideoController::class, 'create'])->name('video.create');
Route::post('/video/store', [VideoController::class, 'store'])->name('video.store');
Route::get('/video/view', [VideoController::class, 'view'])->name('video.view');
Route::delete('/video/destroy/{video_id}', [VideoController::class, 'delete'])->name('video.delete');
Route::get('/video/{video_id}', [VideoController::class, 'show'])->name('video.show');

Route::get('/video/edit/{video_id}', [VideoController::class, 'edit'])->name('video.edit');
Route::put('/video/update/{video_id}', [VideoController::class, 'update'])->name('video.update');
Route::put('/video/update/{video_id}', [VideoController::class, 'update'])->name('video.update');
Route::get('/video-lectures', [VideoController::class, 'showLectures']);
Route::get('/videolec', [VideoController::class, 'showVideoLectures']);