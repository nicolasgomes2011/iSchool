<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('schools.index');
});

// Schools
Route::get('/schools', \App\Livewire\Schools\Index::class)->name('schools.index');
Route::get('/schools/create', \App\Livewire\Schools\Create::class)->name('schools.create');
Route::get('/schools/{id}/edit', \App\Livewire\Schools\Edit::class)->name('schools.edit');
Route::get('/schools/{id}/settings', \App\Livewire\Schools\Settings::class)->name('schools.settings');

// Teachers
Route::get('/teachers', \App\Livewire\Teachers\Index::class)->name('teachers.index');
Route::get('/teachers/create', \App\Livewire\Teachers\Create::class)->name('teachers.create');
Route::get('/teachers/{id}/edit', \App\Livewire\Teachers\Edit::class)->name('teachers.edit');

// Students
Route::get('/students', \App\Livewire\Students\Index::class)->name('students.index');
Route::get('/students/create', \App\Livewire\Students\Create::class)->name('students.create');
Route::get('/students/{id}/edit', \App\Livewire\Students\Edit::class)->name('students.edit');

// Classes
Route::get('/classes', \App\Livewire\Classes\Index::class)->name('classes.index');
Route::get('/classes/create', \App\Livewire\Classes\Create::class)->name('classes.create');
Route::get('/classes/{id}/edit', \App\Livewire\Classes\Edit::class)->name('classes.edit');

// Contents
Route::get('/contents', \App\Livewire\Contents\Index::class)->name('contents.index');
Route::get('/contents/create', \App\Livewire\Contents\Create::class)->name('contents.create');
Route::get('/contents/{id}/edit', \App\Livewire\Contents\Edit::class)->name('contents.edit');

// Grades
Route::get('/grades', \App\Livewire\Grades\Index::class)->name('grades.index');
Route::get('/grades/create', \App\Livewire\Grades\Create::class)->name('grades.create');
Route::get('/grades/{id}/edit', \App\Livewire\Grades\Edit::class)->name('grades.edit');

// Assignments
Route::get('/assignments', \App\Livewire\Assignments\Index::class)->name('assignments.index');
Route::get('/assignments/create', \App\Livewire\Assignments\Create::class)->name('assignments.create');
Route::get('/assignments/{id}/edit', \App\Livewire\Assignments\Edit::class)->name('assignments.edit');

// Exams
Route::get('/exams', \App\Livewire\Exams\Index::class)->name('exams.index');
Route::get('/exams/create', \App\Livewire\Exams\Create::class)->name('exams.create');
Route::get('/exams/{id}/edit', \App\Livewire\Exams\Edit::class)->name('exams.edit');
