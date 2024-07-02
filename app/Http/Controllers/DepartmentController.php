<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description',
        ]);

        $departments = new Department();
        $departments->name = $request->input('name');
        $departments->description = $request->input('description');
        $departments->save();

        return redirect()->route('department.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department, $id)
    {
        $departments = Department::findOrFail($id);
        return view('department.show', compact('departments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $departments, $id)
    {
        $departments = Department::findOrFail($id);
        return view('department.edit', compact('departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department, $id)
    {
        $departments = Department::findOrFail($id);

        $departments->name = $request->input('name');
        $departments->description = $request->input('description');
        $departments->save();

        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department, $id)
    {
        Department::destroy($id);
        return redirect()->route('department.index');
    }
}
