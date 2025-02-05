<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:students',
            'jenis_kelamin' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
        ]);

        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    public function show(Student $student)
    {
        return $student;
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return response()->json($student, 200);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(null, 204);
    }

    public function dashboard()
    {
        $totalStudents = Student::count();
        $totalMale = Student::where('jenis_kelamin', 'Laki-laki')->count();
        $totalFemale = Student::where('jenis_kelamin', 'Perempuan')->count();

        return response()->json([
            'total_students' => $totalStudents,
            'total_male' => $totalMale,
            'total_female' => $totalFemale,
        ], 200);
    }
}