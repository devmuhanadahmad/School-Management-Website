<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public static function rules($id = 0){
        return[
            'name'=>['required','string',"unique:specializations,name,$id"],
        ];
    }
    public function teacher(){
        return $this->hasMany(Teacher::class,'specialization_id','id');
    }
}
