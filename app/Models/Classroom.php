<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Classroom extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'notes',
        'status',
        'schoolgrade_id'
    ];
    public static function rules($id = 0){
        return[
            'name'=>['required','string','min:3','max:255',"unique:classrooms,name,$id"],
            'notes'=>['nullable','string'],
            'status'=>['nullable','in:active,inchived'],
            'schoolgrade_id'=>['required','int','exists:schoolgrades,id'],

        ];
    }
    public function grade(){
        return $this->belongsTo(Schoolgrade::class,'schoolgrade_id','id');
    }
}
