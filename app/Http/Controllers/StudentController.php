<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $programs = Program::all();

        return view('student.create', compact('departments', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'level'=>'required',
            'department_id'=>'required',
            'program_id'=>'required',
        ]);

        $students = new Student();
        $students->name = $request->input('name');
        $students->level = $request->input('level');
        $students->department_id = $request->input('department_id');
        $students->program_id = $request->input('program_id');
        $students->save();
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student, $id)
    {
        $student = Student::findOrFail($id);

        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student, $id)
    {
        $departments = Department::all();
        $programs = Program::all();
        $students = Student::findOrFail($id);
        return view('student.edit', compact('students', 'departments', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student, $id)
    {
        $request->validate([
            'name'=>'required',
            'level'=>'required',
            'department_id'=>'required',
            'program_id'=>'required',
        ]);

        $students = Student::findOrFail($id);
        $students->name = $request->input('name');
        $students->level = $request->input('level');
        $students->department_id = $request->input('department_id');
        $students->program_id = $request->input('program_id');
        $students->save();
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student, $id)
    {
        Student::destroy($id);
        return redirect()->route('student.index');
    }
}
