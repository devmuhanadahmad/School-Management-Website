
<div class="form-contrl row">

    <div class="col">
        <label for="inputName" class="control-label">Exam </label>
        <select name="exam_id" @class([
            'form-control ',
            'SlectBox',
            'is-invalid' => $errors->has('exam_id'),
        ])>
            <!--placeholder-->
            <option value="" selected disabled>Choose School Grade Name..</option>
            @foreach ($exam as $exam)
                <option value="{{ $exam->id }}" @selected(old('exam_id', $examQuestion->exam_id) == $exam->id)>
                    {{ $exam->name }}</option>
            @endforeach
            @error('exam_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </select>
    </div>

    <x-form.input lable="Score " name="score" :value="$examQuestion->score" />

</div><br>




<div class="row">
    <x-form.input lable="Question " name="title" :value="$examQuestion->title" />
</div><br>
<div class="row">
    <x-form.textarea lable="Answer" name="answer" :value="$examQuestion->answer" />
  </div><br>
  <div class="row">
    <x-form.textarea lable="Right Answer" name="right_answer" :value="$examQuestion->right_answer" />
  </div><br>

<br><br>




<br>
<button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save Data</button>


