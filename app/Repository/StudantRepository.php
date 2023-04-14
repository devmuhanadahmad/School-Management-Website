<?php

namespace App\Repository;


use App\Models\Schoolgrade;
use App\Models\Studant;

class StudantRepository implements StudantRepositoryInterface
{
    public function getStudant()
    {
        $studants=Studant::with(['section'])->latest()->get();
        return view('admin.studant.index',compact('studants'));
    }/*
    public function createStudant()
    {

    }
    public function storeStudant($request)
    {

    }
    public function editStudant($id)
    {

    }
    public function updateStudant($request,$id)
    {

    }
    public function destroyStudant($id)
    {

    }*/
}
