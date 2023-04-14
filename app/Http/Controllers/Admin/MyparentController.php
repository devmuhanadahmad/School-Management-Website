<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MyparintRequest;
use App\Models\Myparent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MyparentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parents=Myparent::all();
        return view('admin.parent.index',compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent=new Myparent();
        return view('admin.parent.create',compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MyparintRequest $request)
    {
        Myparent::create([
            'Email' => $request->post('Email'),
            'Password' => Hash::make($request->post('Password')),

            'Name_Father'=>$request->post('Name_Father'),
            'National_ID_Father'=>$request->post('National_ID_Father'),
            'Passport_ID_Father'=>$request->post('Passport_ID_Father'),
            'Phone_Father'=>$request->post('Phone_Father'),
            'Language_Father'=>$request->post('Language_Father'),
            'Nationality_Father_id'=>$request->post('Nationality_Father_id'),
            'Blood_Type_Father_id'=>$request->post('Blood_Type_Father_id'),
            'Religion_Father_id'=>$request->post('Religion_Father_id'),
            'Address_Father'=>$request->post('Address_Father'),

            'Name_Mother'=>$request->post('Name_Mother'),
            'National_ID_Mother'=>$request->post('National_ID_Mother'),
            'Passport_ID_Mother'=>$request->post('Passport_ID_Mother'),
            'Phone_Mother'=>$request->post('Phone_Mother'),
            'Language_Mother'=>$request->post('Language_Mother'),
            'Nationality_Mother_id'=>$request->post('Nationality_Mother_id'),
            'Blood_Type_Mother_id'=>$request->post('Blood_Type_Mother_id'),
            'Religion_Mother_id'=>$request->post('Religion_Mother_id'),
            'Address_Mother'=>$request->post('Address_Mother'),

        ]);
        return redirect()->route('parent.index')->with('success', 'operation accomplished successfully');

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
        $parent=Myparent::findOrFail($id);
        return view('admin.parent.edit',compact('parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MyparintRequest $request, $id)
    {
        $parent=Myparent::findOrFail($id);
        $parent->update([
            'Email' => $request->post('Email'),
            'Password' => Hash::make($request->post('Password')),

            'Name_Father'=>$request->post('Name_Father'),
            'National_ID_Father'=>$request->post('National_ID_Father'),
            'Passport_ID_Father'=>$request->post('Passport_ID_Father'),
            'Phone_Father'=>$request->post('Phone_Father'),
            'Language_Father'=>$request->post('Language_Father'),
            'Nationality_Father_id'=>$request->post('Nationality_Father_id'),
            'Blood_Type_Father_id'=>$request->post('Blood_Type_Father_id'),
            'Religion_Father_id'=>$request->post('Religion_Father_id'),
            'Address_Father'=>$request->post('Address_Father'),

            'Name_Mother'=>$request->post('Name_Mother'),
            'National_ID_Mother'=>$request->post('National_ID_Mother'),
            'Passport_ID_Mother'=>$request->post('Passport_ID_Mother'),
            'Phone_Mother'=>$request->post('Phone_Mother'),
            'Language_Mother'=>$request->post('Language_Mother'),
            'Nationality_Mother_id'=>$request->post('Nationality_Mother_id'),
            'Blood_Type_Mother_id'=>$request->post('Blood_Type_Mother_id'),
            'Religion_Mother_id'=>$request->post('Religion_Mother_id'),
            'Address_Mother'=>$request->post('Address_Mother'),

        ]);
        return redirect()->route('parent.index')->with('success', 'operation accomplished successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent=Myparent::findOrFail($id);
        $parent->delete();
        return redirect()->route('parent.index')->with('success','operation accomplished successfully');


    }
}
