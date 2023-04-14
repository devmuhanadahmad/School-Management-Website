<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Models\Account;
use App\Models\Classroom;
use App\Models\Schoolgrade;
use App\Models\Section;
use App\Models\Studant;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::with(['section', 'schoolgrade', 'classroom'])->latest()->get();

        return view('admin.accounts.index',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account = new Account();
        $section = Section::all();
        $grade = Schoolgrade::all();
        $classroom = Classroom::all();
        return view('admin.accounts.create', compact('account', 'section', 'grade', 'classroom'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        Account::create($request->all());
        return redirect()->route('account.index')->with('success', 'operation accomplished successfully');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showAccountsStudants($schoolgrade_id,$classroom_id){
        $studants=Studant::where('schoolgrade_id',$schoolgrade_id)->where('classroom_id',$classroom_id)->get();
        return view('admin.accounts.show',compact('studants'));
    }
}
