<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'studant_id',
        'account_id',
        'notes',
        'schoolgrade_id',
        'classroom_id',
        'debit',

    ];
    public static function rules($id = 0)
    {
        return [
            'studant_id' => 'required|int|exists:studants,id',
            'account_id' => 'required|int|exists:accounts,id',
            'schoolgrade_id' => 'required|int|exists:schoolgrades,id',
            'classroom_id' => 'required|int|exists:classrooms,id',
            'debit' => 'required|int',
            'notes' => 'nullable|string',
        ];
    }
    public function studant()
    {
        return $this->belongsTo(Studant::class, 'studant_id', 'id');
    }
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}
