<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudantRequest;
use App\Models\Classroom;
use App\Models\Image;
use App\Models\Myparent;
use App\Models\Schoolgrade;
use App\Models\Section;
use App\Models\Studant;
use app\Repository\StudantRepositoryInterface;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studants = Studant::with(['section', 'schoolgrade', 'classroom'])->latest()->get();
        return view('admin.studant.index', compact('studants'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studant = new Studant();
        $section = Section::all();
        $grade = Schoolgrade::all();
        $parent = Myparent::all();
        $classroom = Classroom::all();
        return view('admin.studant.create', compact('studant', 'section', 'grade', 'classroom', 'parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudantRequest $request)
    {
        DB::beginTransaction();
        try {
            $studant = Studant::create([
                'schoolgrade_id' => $request->post('schoolgrade_id'),
                'classroom_id' => $request->post('classroom_id'),
                'section_id' => $request->post('section_id'),
                'myparent_id' => $request->post('myparent_id'),
                'date_birth' => $request->post('date_birth'),
                'academic_year' => $request->post('academic_year'),
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'password' => Hash::make($request->post('password')),
                'gender' => $request->post('gender'),
                'address' => $request->post('address'),
                'joiningDate' => $request->post('joiningDate'),
            ]);
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->store('attachments/studants/', ['disk' => 'public']);
                    // insert in image table
                    Image::create([
                        'filename' => $name,
                        'imageable_id' => $studant->id,
                        'imageable_type' => 'App\Models\Studant',
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('studant.index')->with('success', 'operation accomplished successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('studant.index')->with('errore', "Add operation failed ");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Student = Studant::findOrFail($id);
        return view('admin.studant.show',compact('Student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::all();
        $grade = Schoolgrade::all();
        $parent = Myparent::all();
        $classroom = Classroom::all();
        $studant = Studant::findOrFail($id);
        return view('admin.studant.edit', compact('studant', 'section', 'grade', 'classroom', 'parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudantRequest $request, $id)
    {
        $studant = Studant::findOrFail($id);
        $studant->update([
            'schoolgrade_id' => $request->post('schoolgrade_id'),
            'classroom_id' => $request->post('classroom_id'),
            'section_id' => $request->post('section_id'),
            'myparent_id' => $request->post('myparent_id'),
            'date_birth' => $request->post('date_birth'),
            'academic_year' => $request->post('academic_year'),
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
            'gender' => $request->post('gender'),
            'address' => $request->post('address'),
            'joiningDate' => $request->post('joiningDate'),
        ]);
        return redirect()->route('studant.index')->with('success', 'operation accomplished successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studant = Studant::findOrFail($id);
        $studant->delete();
        return redirect()->route('studant.index')->with('success', 'operation accomplished successfully');
    }
    public function store_attachment(Request $request)
    {
       if($request->hasFile('images')){
              foreach($request->file('images') as $file){
                $name = $file->getClientOriginalName();
                $file->storeAs('attachments/studants/'.$request->post('studant_name'),  $name , ['disk' => 'public']);
                // insert in image table
                Image::create([
                    'filename' => $name,
                    'imageable_id' => $request->post('student_id'),
                    'imageable_type' => 'App\Models\Studant',
                ]);


              }

       }
       return redirect()->back()->with('success', 'operation accomplished successfully');
    }
    public function Download_attachment($studantName,$filename)
    {

        return response()->download(storage_path('app/public/attachments/studants/'.$studantName.'/'.$filename));

    }
    public function delete_attachment($imageable_id)
    {
 

       //return response()->delete(storage_path('app/public/attachments/studants/'.$studantName.'/'.$filename));

       $category = Image::findOrFail($imageable_id);
       dd($category);
       $category->forceDelete();
       if ($category->image) {
           Storage::disk('public')->delete($category->image);
       }
       return redirect()->back()->with('success', __("Category deletion completed Successfully"));

    }
}


