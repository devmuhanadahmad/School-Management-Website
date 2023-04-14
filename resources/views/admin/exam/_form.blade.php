
<div class="row">
    <x-form.input lable="Name exam " name="name" :value="$exam->name" />
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
                <option value="{{ $grade->id }}" @selected(old('schoolgrade_id', $exam->schoolgrade_id) == $grade->id)>
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
                <option value="{{ $classroom->id }}" @selected(old('classroom_id', $exam->classroom_id) == $classroom->id)>
                    {{ $classroom->name }}</option>
            @endforeach
            @error('classroom_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </select>
    </div>

    <div class="col">
        <label for="inputName" class="control-label">Section</label>
        <select name="section_id" @class([
            'form-control ',
            'SlectBox',
            'is-invalid' => $errors->has('section_id'),
        ])>
            <!--placeholder-->
            <option value="" selected disabled>Choose Section Name..</option>
            @foreach ($section as $section)
                <option value="{{ $section->id }}" @selected(old('section_id', $exam->section_id) == $section->id)>
                    {{ $section->name }}</option>
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
                <option value="{{ $teacher->id }}" @selected(old('teacher_id', $exam->teacher_id) == $teacher->id)>
                    {{ $teacher->name }}</option>
            @endforeach
            @error('teacher_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </select>
    </div>
    <div class="col">
        <label for="inputName" class="control-label">Teacher</label>
        <select name="subject_id" @class([
            'form-control ',
            'SlectBox',
            'is-invalid' => $errors->has('subject_id'),
        ])>
            <!--placeholder-->
            <option value="" selected disabled>Choose Teacher Name..</option>
            @foreach ($subject as $subject)
                <option value="{{ $subject->id }}" @selected(old('subject_id', $exam->subject_id) == $subject->id)>
                    {{ $subject->name }}</option>
            @endforeach
            @error('subject_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </select>
    </div>

</div><br>



<br>
<button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save Data</button>


