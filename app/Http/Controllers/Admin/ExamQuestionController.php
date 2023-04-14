<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamQuestionRequest;
use App\Models\Exam;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examQuestions = ExamQuestion::with('exam')->latest()->get();
        return view('admin.examQuestion.index', compact('examQuestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examQuestion = new ExamQuestion();
        $exam = Exam::all();
        return view('admin.examQuestion.create', compact('exam','examQuestion'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamQuestionRequest $request)
    {
        ExamQuestion::create($request->all());
        return redirect()->route('examQuestion.index')->with('success', 'operation accomplished successfully');

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
        $examQuestion = ExamQuestion::findOrFail($id);
        $exam = Exam::all();
        return view('admin.examQuestion.edit', compact('examQuestion','exam'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamQuestionRequest $request, $id)
    {
        $examQuestion = ExamQuestion::findOrFail($id);
        $examQuestion->update($request->all());
        return redirect()->route('examQuestion.index')->with('success', 'operation accomplished successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examQuestion = ExamQuestion::findOrFail($id);
        $examQuestion->delete();
        return redirect()->route('examQuestion.index')->with('success', 'operation accomplished successfully');

    }
}
