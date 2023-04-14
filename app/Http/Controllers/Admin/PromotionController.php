<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Promotion;
use App\Models\Schoolgrade;
use App\Models\Section;
use App\Models\Studant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
  public function index()
  {
    $studant = new Studant();
    $section = Section::all();
    $sections = Section::all();
    $grade = Schoolgrade::all();
    $grades = Schoolgrade::all();
    $classroom = Classroom::all();
    $classrooms = Classroom::all();

    return view('admin.promotion.index', compact('studant', 'section', 'grade', 'classroom', 'grades', 'classrooms', 'sections'));
  }
  public function store(Request $request)
  {
    DB::beginTransaction();
    try {
      $studants = Studant::where('schoolgrade_id', $request->post('schoolgrade_id'))
        ->where('classroom_id', $request->post('classroom_id'))
        ->where('section_id', $request->post('section_id'))
        ->get();

      //check studant
      if (count($studants) < 1) {
        return redirect()->route('promotion.index')->with('errore', "not found studant in class  ");
      }

      foreach ($studants as $studant) {
        $ids = explode(',', $studant->id);

        Studant::whereIn('id', $ids)
          ->update([
            'schoolgrade_id' => $request->post('to_schoolgrade_id'),
            'classroom_id' => $request->post('to_classroom_id'),
            'section_id' => $request->post('to_section_id'),
          ]);

        Promotion::updateOrCreate([
          'studant_id' => $studant->id,

          'schoolgrade_id' => $request->post('schoolgrade_id'),
          'classroom_id' => $request->post('classroom_id'),
          'section_id' => $request->post('section_id'),

          'to_schoolgrade_id' => $request->post('to_schoolgrade_id'),
          'to_classroom_id' => $request->post('to_classroom_id'),
          'to_section_id' => $request->post('to_section_id'),
        ]);
      }

      DB::commit();
      return redirect()->route('promotion.index')->with('success', 'operation accomplished successfully');

    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->route('promotion.index')->with('errore', "Add operation failed ");
    }
  }
}
