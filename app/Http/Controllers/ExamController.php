<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exam = Exam::all();
        return view('exam.index', compact('exam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lecturers = Lecturer::all();
        $courses= Course::all();
        return view('exam.create', compact('lecturers', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'date'=>'required|date_format:d/m/Y',
            'file' => 'required|file|mimes:jpeg,png,pdf,docx,xlsx,pptx|max:50000',
            'lecturer_id' => 'required',
            'course_id' => 'required',
        ]);

        $exam = new Exam();
        $exam->title = $request->input('title');
        $exam->description = $request->input('description');
        $exam->date = $request->input('date');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs(('exam_files'), $filename);
            $exam->file = $path;
        }
        $exam->lecturer_id = $request->input('lecturer_id');
        $exam->course_id = $request->input('course_id');
        $exam->save();
        return redirect()->route('exam.index')->with('success', 'Exam created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam, $id)
    {
        $exam = Exam::findOrFail($id);
        return view('exam.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam, $id)
    {
        $exams = Exam::findOrFail($id);
        $lecturers = Lecturer::all();
        $courses = Course::all();
        return view('exam.edit', compact('exams', 'lecturers', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'date'=>'required|date_format:d/m/Y',
            'file' => 'required|file|mimes:jpeg,png,pdf,docx,xlsx,pptx|max:50000',
            'grade'=>'required',
            'score'=>'required',
            'lecturer_id' => 'required',
            'course_id' => 'required',
        ]);

        $exam = Exam::findOrFail($id);
        $exam->title = $request->input('title');
        $exam->description = $request->input('description');
        $exam->date = $request->input('date');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs(('exam_files'), $filename);
            $exam->file = $path;
        }
        $exam->grade = $request->input('grade');
        $exam->score = $request->input('score');
        $exam->lecturer_id = $request->input('lecturer_id');
        $exam->course_id = $request->input('course_id');
        $exam->save();
        return redirect()->route('exam.index')->with('success', 'Exam updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam, $id)
    {
        Exam::destroy($id);
        return redirect()->route('exam.index')->with('success', 'Exam deleted successfully.');
    }
}
