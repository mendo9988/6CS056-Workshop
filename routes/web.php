<?php

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/students', function () {

    $students = Student::all();

    return view('student.list', [
        'students' => $students,
    ]);
})->name('students.index');

Route::get('/students/create', function () {
    return view('student.create');
});

Route::post('/students', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student = Student::create($validated);

    return redirect()->route('students.index')
        ->with('success', "Student {$student->name} created successfully!");
});

Route::get('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.detail', [
        'student' => $student,
    ]);
});

Route::get('/students/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.edit', [
        'student' => $student,
    ]);
});

Route::put('/students/{id}', function (Request $request, $id) {
    $student = Student::findOrFail($id);
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            'max:255',

            Rule::unique('students')->ignore($student->id),
        ],
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect('/students/'.$student->id)
        ->with('success', 'Student updated successfully!');
});

Route::delete('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);

    $student->delete();

    return redirect('/students')
        ->with(
            'success',
            'Student deleted successfully!'
        );
});

Route::get('/courses', function () {
    $courses = Course::query()->latest()->get();

    return view('course.list', [
        'courses' => $courses,
    ]);
})->name('courses.index');

Route::get('/courses/create', function () {
    return view('course.create');
})->name('courses.create');

Route::post('/courses', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:5000',
        'duration' => 'required|integer|min:1|max:4294967295',
        'fee' => 'required|numeric|decimal:0,2|min:0|max:99999999.99',
        'difficulty' => ['required', Rule::in(['Easy', 'Medium', 'Hard'])],
        'is_active' => 'required|boolean',
    ]);

    $course = Course::create($validated);

    return redirect()->route('courses.index')
        ->with('success', "Course {$course->name} created successfully!");
})->name('courses.store');

Route::get('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);

    return view('course.detail', [
        'course' => $course,
    ]);
})->name('courses.show');

Route::get('/courses/{id}/edit', function ($id) {
    $course = Course::findOrFail($id);

    return view('course.edit', [
        'course' => $course,
    ]);
})->name('courses.edit');

Route::put('/courses/{id}', function (Request $request, $id) {
    $course = Course::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:5000',
        'duration' => 'required|integer|min:1|max:4294967295',
        'fee' => 'required|numeric|decimal:0,2|min:0|max:99999999.99',
        'difficulty' => ['required', Rule::in(['Easy', 'Medium', 'Hard'])],
        'is_active' => 'required|boolean',
    ]);

    $course->update($validated);

    return redirect()->route('courses.show', $course->id)
        ->with('success', 'Course updated successfully!');
})->name('courses.update');

Route::delete('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);
    $course->delete();

    return redirect()->route('courses.index')
        ->with('success', 'Course deleted successfully!');
})->name('courses.destroy');
