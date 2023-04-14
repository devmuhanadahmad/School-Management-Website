<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolGradeRequest;
use App\Models\Classroom;
use App\Models\Schoolgrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SchoolgradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolGrade = Schoolgrade::all();
        return view('admin.schoolGrade.index', compact('schoolGrade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schoolGrade = new Schoolgrade();
        return view('admin.schoolGrade.create', compact('schoolGrade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolGradeRequest $request)
    {
        Schoolgrade::create($request->all());
        return redirect()->route('schoolGrade.index')->with('success', 'operation accomplished successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schoolGrade = Schoolgrade::findOrFail($id);
        return view('admin.schoolGrade.edit', compact('schoolGrade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SchoolGradeRequest $request, $id)
    {
        $schoolGrade = Schoolgrade::findOrFail($id);
        $schoolGrade->update($request->all());
        return redirect()->route('schoolGrade.index')->with('success', 'operation accomplished successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $schollGrade = Schoolgrade::findOrFail($id);
        $ids=DB::table('classrooms')->where('schoolgrade_id', '=', $id)->pluck('id');
      //  dd($ids);
        if($ids->count() > 0){
            return redirect()->route('schoolGrade.index')->with('errore', 'The academic stage cannot be deleted because one or more classes are linked to it');
        }else{
            $schollGrade->delete();
            return redirect()->route('schoolGrade.index')->with('success', 'operation accomplished successfully');
        }

    }
}
