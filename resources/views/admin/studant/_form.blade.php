<div>
    <h5 class="text-success">Personal information</h5>
</div>
<div class="row">
    <x-form.input lable="Name Schoole Grade " name="name" :value="$studant->name" />
</div>

<div class="row">
    <x-form.input lable="email " name="email" type="email" :value="$studant->email" />
    <x-form.input lable="password" name="password" type="password" :value="$studant->password" />
</div>

<div class="row">
    <x-form.input lable="Date Birth" name="date_birth" type="date" :value="date('Y-m-d')" />
    <x-form.input lable="Academic Year" name="academic_year" type="date" :value="date('Y-m-d')" />
    <x-form.status lable="Gender" name="gender" :value="$studant->status" :option="['male' => 'Male', 'female' => 'Female']" />
</div><br />

<div class="row">
    <x-form.textarea lable="Address" name="address" :value="$studant->address" />
</div><br />
<div>
    <h5 class="text-success">Student information</h5>
</div>
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
                <option value="{{ $grade->id }}" @selected(old('schoolgrade_id', $studant->schoolgrade_id) == $grade->id)>
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
                <option value="{{ $classroom->id }}" @selected(old('classroom_id', $studant->classroom_id) == $classroom->id)>
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
                <option value="{{ $section->id }}" @selected(old('section_id', $studant->section_id) == $section->id)>
                    {{ $section->name }}</option>
            @endforeach
            @error('classroom_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </select>
    </div>


    <div class="col">
        <label for="inputName" class="control-label">Parints  </label>
        <select name="myparent_id" @class([
            'form-control ',
            'SlectBox',
            'is-invalid' => $errors->has('myparent_id'),
        ])>
            <!--placeholder-->
            <option value="" selected disabled>Choose Parents Name ..</option>
            @foreach ($parent as $parent)
                <option value="{{ $parent->id }}" @selected(old('myparent_id', $studant->myparent_id) == $parent->id)>
                    {{ $parent->name }}</option>
            @endforeach
            @error('myparent_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </select>
    </div>

</div><br>
<div>
    <h5 class="text-success">Attachments Studant</h5>
</div>

<div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" name="images" multiple accept="image/*" class="form-control-file" id="exampleFormControlFile1">
  </div>


<br>
<button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save Data</button>


