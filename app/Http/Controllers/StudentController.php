
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
        $validated = $request->validate([
            'roll_no' => 'required|string|unique:students,roll_no',
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'department' => 'nullable|string',
            'semester' => 'nullable|integer',
            'cgpa' => 'nullable|numeric',
        ]);

        $validated['department'] = $validated['department'] ?? 'CSE';
        $validated['semester'] = $validated['semester'] ?? 7;

        Student::create($validated);

        return redirect('/students')
            ->with('status', 'Student saved successfully!');
    }

    // Display one student
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Display edit form
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());

        return redirect('/students')
            ->with('status', 'Student updated successfully!');
    }

    // Delete student
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('/students')
            ->with('status', 'Student deleted successfully!');
    }
}
