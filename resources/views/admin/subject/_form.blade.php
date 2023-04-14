
<div class="row">
    <x-form.input lable="Name Subject " name="name" :value="$subject->name" />
</div>

<br><br>
<div class="form-contrl row">

    <div class="col">
        <label for="inputName" class="control-label">School Grade  </label>
        <select name="schoolgrade_id" @class([
            'form-control ',
            'SlectBox',
            'is-invalid' => $errors->has('schoolgrade_id'),
        ])>
            <!--placeholder-->
            <option value="" selected disabled>Choose School Grade Name..</option>
            @foreach ($grade as $grade)
                <option value="{{ $grade->id }}" @selected(old('schoolgrade_id', $subject->schoolgrade_id) == $grade->id)>
                    {{ $grade->name }}</option>
            @endforeach
            @error('schoolgrade_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </select>
    </div>


    <div class="col">
        <label for="inputName" class="control-label">Classroom </label>
        <select name="classroom_id" @class([
            'form-control ',
            'SlectBox',
            'is-invalid' => $errors->has('classroom_id'),
        ])>
            <!--placeholder-->
            <option value="" selected disabled>Choose Classroom Name ..</option>
            @foreach ($classroom as $classroom)
                <option value="{{ $classroom->id }}" @selected(old('classroom_id', $subject->classroom_id) == $classroom->id)>
                    {{ $classroom->name }}</option>
            @endforeach
            @error('classroom_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </select>
    </div>


    <div class="col">
        <label for="inputName" class="control-label">Teacher</label>
        <select name="teacher_id" @class([
            'form-control ',
            'SlectBox',
            'is-invalid' => $errors->has('teacher_id'),
        ])>
            <!--placeholder-->
            <option value="" selected disabled>Choose Teacher Name..</option>
            @foreach ($teacher as $teacher)
                <option value="{{ $teacher->id }}" @selected(old('teacher_id', $subject->teacher_id) == $teacher->id)>
                    {{ $teacher->name }}</option>
            @endforeach
            @error('teacher_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </select>
    </div>


</div><br>



<br>
<button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save Data</button>


