<?php

namespace App\Http\Controllers\StudAuth;

use App\Models\Program;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class StudRegisterController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        // Fetch departments and programs to populate dropdowns in the view
        $departments = Department::all(); // Adjust if using different method
        $programs = Program::all(); // Adjust if using different method
        return view('Student.auth.register', compact('departments', 'programs'));
    }

    // Handle the registration process
    public function register(Request $request)
{
    $request->validate([
        'indexnumber' => 'required|unique:students,indexnumber',
        'level' => 'required|integer|in:100,200,300,400',
        'department_id' => 'required|exists:departments,id',
        'program_id' => 'required|exists:programs,id',
        'firstname' => 'required',
        'othernames' => 'nullable',
        'lastname' => 'required',
        'email' => 'required|email|unique:studentprofile,email',
        'phone' => 'nullable',
        'password' => 'required|min:8|confirmed',
    ]);

    // Create and save the student
    $student = Student::create([
        'indexnumber' => $request->input('indexnumber'),
        'level' => $request->input('level'),
        'department_id' => $request->input('department_id'),
        'program_id' => $request->input('program_id'),
    ]);
    // return $student;

    // Check if student creation was successful
    if ($student) {
        Log::info('Student created successfully', ['student_id' => $student->id]);

        // Create and save the student profile, using the relationship
        $studentProfile = new StudentProfile([
            'firstname' => $request->input('firstname'),
            'othernames' => $request->input('othernames'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
            'students_id' => $student->id,
        ]);
        $studentProfile->save();
        // return $studentProfile;
        // $studentProfile = new StudentProfile();
        // $studentProfile->firstname = $request->input('firstname');
        // $studentProfile->othernames = $request->input('othernames');
        // $studentProfile->lastname = $request->input('lastname');
        // $studentProfile->email = $request->input('email');
        // $studentProfile->password = Hash::make($request->input('password'));
        // $studentProfile->phone = $request->input('phone');
        // $studentProfile->save();


        // Check if profile creation was successful
    //     if ($savedProfile) {
    //         Log::info('Student profile created successfully', ['studentprofile_id' => $studentProfile->id]);
    //     } else {
    //         Log::error('Failed to create student profile', ['student_id' => $student->id]);
    //     }
    // } else {
    //     Log::error('Failed to create student');
    // }

    return redirect()->route('stdashboard');
}

}};
