<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Exam;
use App\Models\Schoolgrade;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::with(['subject','teacher','section', 'schoolgrade', 'classroom'])->latest()->get();
        return view('admin.exam.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exam = new Exam();
        $section = Section::all();
        $grade = Schoolgrade::all();
        $subject = Subject::all();
        $classroom = Classroom::all();
        $teacher = Teacher::all();
        return view('admin.exam.create', compact('subject', 'section', 'grade', 'classroom', 'exam','teacher'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Exam::create($request->all());
        return redirect()->route('exam.index')->with('success', 'operation accomplished successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $section = Section::all();
        $grade = Schoolgrade::all();
        $subject = Subject::all();
        $classroom = Classroom::all();
        $teacher = Teacher::all();
        return view('admin.exam.edit', compact('subject', 'section', 'grade', 'classroom', 'exam','teacher'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->update($request->all());
        return redirect()->route('exam.index')->with('success', 'operation accomplished successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();
        return redirect()->route('exam.index')->with('success', 'operation accomplished successfully');

    }
}
