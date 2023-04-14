<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineClass extends Model
{
    use HasFactory;
    protected $fillable = [
        'schoolgrade_id',
        'classroom_id',
        'section_id',
        'user_id',
        'meeting_id',
        'topic',
        'duration',
        'start_at',
        'password',
        'start_url',
        'join_url',

    ];
    public static function rules($id = 0)
    {
        return [
            'schoolgrade_id' => 'required|int|exists:schoolgrades,id',
            'classroom_id' => 'required|int|exists:classrooms,id',
            'section_id' => 'required|int|exists:sections,id',
            'user_id' => 'required|int|exists:users,id',
            'meeting_id' => ['required', 'string'],
            'topic' => ['required', 'string'],
            'duration' => ['required', 'int'],
            'start_at' => ['required'],
            'password' => ['required', 'string'],
            'start_url' => ['required', 'string'],
            'join_url' => ['required', 'string'],

        ];
    }
    public function schoolgrade()
    {
        return $this->belongsTo(Schoolgrade::class, 'schoolgrade_id', 'id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id', 'id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
