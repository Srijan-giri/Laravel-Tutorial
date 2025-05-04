<?php

use App\Http\Controllers\RelationshipController;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('relationship')->group(function(){
    Route::get('/person/{id}',[RelationshipController::class,'getPerson'])->name('person');
    Route::get('/all-persons-post',[RelationshipController::class,'allPersonsPost'])->name('all-persons-post');
    Route::get('/post/{id}',[RelationshipController::class,'postBelognsToPerson'])->name('post');
    Route::get('/all-posts',[RelationshipController::class,'getAllPosts'])->name('all-posts');


    Route::get('/students-with-course/{id}',[RelationshipController::class,'students_with_course'])->name('students-with-course');
    Route::get('/all-students',[RelationshipController::class,'getAllStudents'])->name('all-students');
    Route::get('/all-courses',[RelationshipController::class,'getAllCourse'])->name('all-courses');
    Route::get('/course-enrolled-students/{courseId}',[RelationshipController::class,'courseEnrolledStudents'])->name('course-enrolled-students');


    Route::get('/profile-with-person/{id}',[RelationshipController::class,'getProfileWithPerson'])->name('profile-with-person');
    Route::get('/all-persons-with-profile',[RelationshipController::class,'getAllPersonWithProfile'])->name('all-persons-with-profile');
    Route::get('/person-with-profile/{id}',[RelationshipController::class,'getPersonProfile'])->name('person-with-profile');

    Route::get('/all-course-with-teachers',[RelationshipController::class,'getAllCourseWithTeachers'])->name('all-course-with-teachers');
    Route::get('/all-teacher-with-courses',[RelationshipController::class,'getAllTeacherWithCourses'])->name('all-teachers-with-courses');
});
