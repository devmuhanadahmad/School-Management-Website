<?php

namespace App\Http\Requests;

use App\Models\ExamQuestion;
use Illuminate\Foundation\Http\FormRequest;

class ExamQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id=$this->route('examQuestion');
        return ExamQuestion::rules($id);
    }
}
