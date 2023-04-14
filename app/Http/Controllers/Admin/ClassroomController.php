<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Schoolgrade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms=Classroom::with(['grade'])->latest()->get();
        return view('admin.classroom.index',compact('classrooms'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classroom=new Classroom();
        $grades=Schoolgrade::all();
        return view('admin.classroom.create',compact('classroom','grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomRequest $request)
    {
        Classroom::create($request->all());
        return redirect()->route('classroom.index')->with('success','operation accomplished successfully');

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
        $classroom=Classroom::findOrFail($id);
        $grades=Schoolgrade::all();
        return view('admin.classroom.edit',compact('classroom','grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomRequest $request, $id)
    {
        $classroom=Classroom::findOrFail($id);
        $classroom->update($request->all());
        return redirect()->route('classroom.index')->with('success', 'operation accomplished successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classroom=Classroom::findOrFail($id);
        $classroom->delete();
        return redirect()->route('classroom.index')->with('success','operation accomplished successfully');

    }
    /*
    public function trash(){
        $classroom=Classroom::onlyTrashed()->paginate();
        return view('admin.classroom.trash',compact('classroom'));
    }
    public function restore($id){
        $classroom=Classroom::onlyTrashed()->findOrFail($id);
        $classroom->restore();
        return redirect()->route('classroom.trash')->with('success','operation accomplished successfully');        ;
    }
    public function forcedelete($id){
        $classroom=Classroom::onlyTrashed()->findOrFail($id);
        $classroom->forceDelete();
        return redirect()->route('classroom.trash')->with('success','operation accomplished successfully');        ;
    }
    */
}
