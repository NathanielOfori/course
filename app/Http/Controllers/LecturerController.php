<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Lecturer;
use App\Models\Department;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturers = Lecturer::with('department', 'program', 'courses',)->get();
        return view('lecturer.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $programs = Program::all();
        return view('lecturer.create', compact('departments', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name'=>'required',
            'department_id'=>'required',
            'program_id'=>'required',

        ]);

        $lecturer = new Lecturer();
        $lecturer ->name = $request->input('name');
        $lecturer->department_id = $request->input('department_id');
        $lecturer->program_id = $request->input('program_id');
        $lecturer->save();
        return redirect()->route('lecturer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecturer $lecturer, $id)
    {
        $lecturer = Lecturer::findOrFail($id);
        return view('lecturer.show', compact('lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer, $id)
    {
        $department = Department::all();
        $lecturer = Lecturer::findOrFail($id);
        return view('lecturer.edit', compact('lecturer', 'department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer, $id)
    {
        $request -> validaate([
            'name'=>'required',
            'department_id'=>'required',
            'program_id'=>'required',

        ]);

        $lecturer = Lecturer::findOrFail($id);
        $lecturer ->name = $request->input('name');
        $lecturer->department_id = $request->input('department_id');
        $lecturer->program_id = $request->input('program_id');
        $lecturer->save();
        return redirect()->route('lecturer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer, $id)
    {
        Lecturer::destroy($id);
        return redirect()->route('lecturer.index');
    }
}
