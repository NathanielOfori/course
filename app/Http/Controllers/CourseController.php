<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Program;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('program', 'lecturers')->get();
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        $lecturers = Lecturer::all();
        return view ('course.create', compact('programs', 'lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'name' => 'required',
            'course_code' => 'required',
            'description' => 'required',
            'credithours' => 'required',
            'program_id' => 'required',
            'lecturers' => 'required|array',
            'lecturers.*' => 'integer|exists:lecturers,id',
        ]);

        $course = new Course();
        $course->name = $request->input('name');
        $course->course_code = $request->input('course_code');
        $course->description = $request->input('description');
        $course->credithours = $request->input('credithours');
        $course->program_id = $request->input('program_id');
        $course->save();
        $course->lecturers()->attach($request->input('lecturers'));  // Attach multiple lecturers to the course
        return redirect()->route('course.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, $id)
    {
        //$courses = Course :: find($id);

        $course = Course::findOrFail($id);
        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $programs = Program::all();
        $lecturers = Lecturer::all();
        return view('course.edit', compact('course', 'programs', 'lecturers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate( [
            'name' => 'required',
            'course_code' => 'required',
            'description' => 'required',
            'credithours' => 'required',
            'program_id' => 'required',
            'lecturers' => 'required|array|min:1',  // Validate that an array of lecturer IDs is present
            'lecturers.*' => 'integer|exists:lecturers,id',  // Validate each ID in the array

        ]);

        $course = Course::findOrFail($id);
        $course->name = $request->input('name');
        $course->course_code = $request->input('course_code');
        $course->description = $request->input('description');
        $course->credithours = $request->input('credithours');
        $course->program_id = $request->input('program_id');
        $course->save();
        $course->lecturers()->sync($request->input('lecturers'));  // Attach multiple lecturers to the course
        return redirect()->route('course.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, $id)
    {
        Course::destroy($id);
        return redirect()->route('course.index')->with('success', 'Course deleted successfully.');
    }
}
