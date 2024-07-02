<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Program;
use App\Models\Lecturer;
use App\Models\Assignment;
use App\Models\Department;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::with('department')->get();
        return view('program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('program.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'department_id' => 'required',
        ]);

        $program = new Program();
        $program->name = $request->input('name');
        $program->description = $request->input('description');
        $program->department_id = $request->input('department_id');
        $program->save();

        return redirect()->route('program.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program, $id)
    {
        $program = Program::findOrFail($id);
        return view('program.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program, $id)
    {
        $department = Department::all();
        $program = Program::findOrFail($id);

        return view('program.edit', compact('program', 'department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program, $id)
    {
        $program = Program::findOrFail($id);
        $program->name = $request->input('name');
        $program->description = $request->input('description');
        $program->department_id = $request->input('department_id');
        $program->save();
        return redirect()->route('program.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program, $id)
    {
        Program::destroy($id);
        return redirect()->route('program.index');
    }
}
