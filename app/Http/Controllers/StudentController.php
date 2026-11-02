<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    // Display create form
    public function create()
    {
        return view('students.create');
    }

    // Save student
    public function store(Request $request)
    {
   $request->validate([
    'roll_no' => 'required|unique:students,roll_no',
    'name' => 'required',
    'email' => 'required|email|unique:students,email',
    'department' => 'required',
    'semester' => 'required|integer',
    'cgpa' => 'nullable|numeric'
]);
        Student::create($request->all());

        return redirect('/students')
            ->with('status', 'Student saved successfully!');
    }

    // Display one student using implicit binding
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());

        return redirect('/students')
            ->with('status', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('/students')
            ->with('status', 'Student deleted successfully!');
    }
}