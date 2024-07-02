<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignment = Assignment::all();
        return view('assignment.index', compact('assignment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $lecturers = Lecturer::all();

        return view('assignment.create', compact('courses', 'lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'file' => 'required|file|mimes:jpeg,png,pdf,docx,xlsx,pptx|max:50000',
            'deadline'=>'required|date_format:d/m/Y',
            'grade'=>'required',
            'score'=>'required',
            'course_id'=>'required',
            'lecturer_id'=>'required',
        ]);

        $assignment = new Assignment();
        $assignment->title = $request->input('title');
        $assignment->description = $request->input('description');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('assignment_files', $filename);
            $assignment->file = $path;
        }
        $assignment->deadline = $request->input('deadline');
        $assignment->grade = $request->input('grade');
        $assignment->score = $request->input('score');
        $assignment->course_id = $request->input('course_id');
        $assignment->lecturer_id = $request->input('lecturer_id');
        $assignment->save();
        return redirect()->route('assignment.index')->with('success', 'Assignment created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Assignment $assignment, $id)
    {
        $assignment = Assignment::findOrFail($id);
        return view('assignment.show', compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment, $id)
    {
        $assignment = Assignment::findOrFail($id);
        $courses = Course::all();
        $lecturers = Lecturer::all();
        return view('assignment.edit', compact('assignment', 'courses', 'lecturers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignment $assignment, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'file' => 'required|file|mimes:jpeg,png,pdf,docx,xlsx,pptx|max:50000',
            'deadline'=>'required|date_format:d/m/Y',
            'grade'=>'required',
            'score'=>'required',
            'course_id'=>'required',
            'lecturer_id'=>'required',
        ]);

        $assignment = Assignment::findOrFail($id);
        $assignment->title = $request->input('title');
        $assignment->description = $request->input('description');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('assignment_files', $filename, 'public');
            $assignment->file = $path;
        }
        $assignment->deadline = Carbon::createFromFormat('d/m/Y', $request->input('deadline'));
        $assignment->grade = $request->input('grade');
        $assignment->score = $request->input('score');
        $assignment->course_id = $request->input('course_id');
        $assignment->lecturer_id = $request->input('lecturer_id');
        $assignment->save();
        return redirect()->route('assignment.index')->with('success', 'Assignment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment, $id)
    {
        Assignment::destroy($id);
        return redirect()->route('assignment.index')->with('success', 'Assignment deleted successfully.');

    }
}
