<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Auth::user()->firstname;
        $students = StudentProfile::with('student')->get();
        return view('student.dashboard', compact('students'));
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
        // $request->validate([
        //     'index_number' => 'required|unique:students,index_number',
        //     'level' => 'required|integer|min:100|max:500',
        //     'department_id'=>'required',
        //     'program_id'=>'required',
        //     'first_name' => 'required',
        //     'other_names' => 'nullable',
        //     'last_name' => 'required',
        //     'email' => 'required|email|unique:student_profiles,email',
        //     'phone' => 'nullable',
        //     'password' => 'required|min:8|confirmed',
        // ]);

        // $students = new Student();
        // $students->index_number = $request->input('index_number');
        // $students->level = $request->input('level');
        // $students->department_id = $request->input('department_id');
        // $students->program_id = $request->input('program_id');
        // $students->save();

        // $studentprofiles = new StudentProfile();
        // $studentprofiles->student_id = $request->input('student_id');
        // $studentprofiles->first_name = $request->input('first_name');
        // $studentprofiles->other_names = $request->input('other_names');
        // $studentprofiles->last_name = $request->input('last_name');
        // $studentprofiles->email = $request->input('email');
        // $studentprofiles->password = Hash::make($request->input('password'));
        // $studentprofiles->phone = $request->input('phone');
        // $studentprofiles->save();

        // $student = Student::create([
        //     'index_number' => $request->index_number,
        //     'level' => $request->level,
        //     'department_id' => $request->department_id,
        //     'program_id' => $request->program_id,
        // ]);

        // StudentProfile::create([
        //     'student_id' => $student->id,
        //     'first_name' => $request->first_name,
        //     'other_name' => $request->other_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'phone' => $request->phone,

        // ]);


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
