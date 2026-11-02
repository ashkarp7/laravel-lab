@extends('layouts.app')

@section('content')

<h1>Student Details</h1>

<p>Roll Number: {{ $student->roll_no }}</p>

<p>Name: {{ $student->name }}</p>

<p>Email: {{ $student->email }}</p>

<p>Department: {{ $student->department }}</p>

<p>Semester: {{ $student->semester }}</p>

<p>CGPA: {{ $student->cgpa }}</p>

<a href="{{ route('students.index') }}">Back to Students</a>

@endsection