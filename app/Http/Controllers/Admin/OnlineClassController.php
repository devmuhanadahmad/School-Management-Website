<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\Classroom;
use App\Models\OnlineClass;
use App\Models\Schoolgrade;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineClassController extends Controller
{
    use MeetingZoomTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onlineClass = OnlineClass::with([ 'schoolgrade', 'classroom','section'])->latest()->get();
        return view('admin.onlineClass.index', compact('onlineClass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $onlineClass = new OnlineClass();
        $grade = Schoolgrade::all();
        $section = Section::all();
        $classroom = Classroom::all();
        return view('admin.onlineClass.create', compact('onlineClass','section',  'grade', 'classroom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meeting=$this->creatMeetingZoom($request);
        OnlineClass::create([
            'schoolgrade_id'=>$request->post('schoolgrade_id'),
            'classroom_id'=>$request->post('classroom_id'),
            'section_id'=>$request->post('section_id'),
            'user_id'=>1,//Auth::user()->id,
            'meeting_id'=>$meeting->id,
            'topic'=>$request->post('topic'),
            'duration'=>$request->post('duration'),
            'start_at'=>$request->post('start_at'),
            'password'=>$meeting->password,
            'start_url'=>$meeting->start_url,
            'join_url'=>$meeting->join_url,
        ]);
        return redirect()->route('onlineClass.index')->with('success', 'operation accomplished successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($meeting_id)
    {
        //dd($meeting_id);
        $meeting=Zoom::meeting()->find($meeting_id);$meeting->delete();
        OnlineClass::where('meeting_id',$meeting_id)->delete();
        return redirect()->route('onlineClass.index')->with('success', 'operation accomplished successfully');

    }
}
