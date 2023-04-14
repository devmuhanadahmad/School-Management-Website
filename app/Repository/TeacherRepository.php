<?php

namespace App\Repository;

use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function getAllTeachers()
    {
        return Teacher::all();
    }

    public function getNewTeacher()
    {
        return new Specialization;
    }

    public function getAllSpecializations()
    {
        return Specialization::all();
    }

    public function soreTeacher($request)
    {
        Teacher::create([
            'specialization_id' => $request->post('specialization_id'),
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
            'gender' => $request->post('gender'),
            'address' => $request->post('address'),
            'joiningDate' => $request->post('joiningDate'),
        ]);
        return redirect()->route('teacher.index')->with('success', 'operation accomplished successfully');
    }

    public function editTeacher($id)
    {
        return $teacher = Teacher::findOrFail($id);
    }

    public function updateTeacher($request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update([
            'specialization_id' => $request->post('specialization_id'),
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
            'gender' => $request->post('gender'),
            'address' => $request->post('address'),
            'joiningDate' => $request->post('joiningDate'),
        ]);
        return redirect()->route('teacher.index')->with('success', 'operation accomplished successfully');
    }
    public function destroyTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success', 'operation accomplished successfully');
    }
}
