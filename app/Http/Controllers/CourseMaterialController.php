<?php

namespace App\Http\Controllers;

use id;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;

class CourseMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coursematerials = CourseMaterial::with('course')->get();
        return view('coursematerial.index', compact('coursematerials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('coursematerial.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'files' => 'required|file|mimes:jpeg,png,pdf,docx,xlsx,pptx|max:50000',
        ]);

        $coursematerials = new CourseMaterial();
        $coursematerials->course_id = $request->input('course_id');
        if ($request->hasFile('files')) {
            $file = $request->file('files');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('course_files', $filename, 'public');
            $coursematerials->files = $path;
        }
        $coursematerials->save();
        return redirect()->route('coursematerial.index')->with('success', 'Course Material Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseMaterial $courseMaterial, $id)
    {
        $coursematerials = CourseMaterial::findOrFail($id);
        return view ('coursematerial.show', compact('coursematerials'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseMaterial $courseMaterial, $id)
    {
        $coursematerials = CourseMaterial::findOrFail($id);
        $courses = Course::all();
        return view('coursematerial.edit', compact('coursematerials', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseMaterial $courseMaterial, $id)
    {
        $request->validate([
            'course_id' => 'required',
            'files' => 'required|file|mimes:jpeg,png,pdf,docx,xlsx,pptx|max:50000',
        ]);

        $coursematerials = CourseMaterial::findOrFail($id);
        $coursematerials->course_id = $request->input('course_id');
        if ($request->hasFile('files')) {
            $file = $request->file('files');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('course_files', $filename);
            $coursematerials->files = $path;
        }
        $coursematerials->save();
        return redirect()->route('coursematerial.index')->with('success', 'Course Material Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseMaterial $courseMaterial, $id)
    {
        CourseMaterial::destroy($id);
        return redirect()->route('coursematerial.index')->with('success', 'Course Material Deleted Successfully');
    }
}
