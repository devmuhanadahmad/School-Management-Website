<div class="row">
    <x-form.input lable="Name" name="name" :value="$account->name" />
    <x-form.input lable="Price" name="price" type="number" :value="$account->price" />
</div>

<br />
<div class="row">
    <x-form.textarea lable="Notes" name="notes" :value="$account->notes" />
</div><br />

<div class="form-contrl row">

    <div class="col">
        <label for="inputName" class="control-label">School Grade </label>
        <select name="schoolgrade_id" @class([
            'form-control ',
            'SlectBox',
            'is-invalid' => $errors->has('schoolgrade_id'),
        ])>
            <!--placeholder-->
            <option value="" selected disabled>Choose School Grade Name..</option>
            @foreach ($grade as $grade)
                <option value="{{ $grade->id }}" @selected(old('schoolgrade_id', $account->schoolgrade_id) == $grade->id)>
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
                <option value="{{ $classroom->id }}" @selected(old('classroom_id', $account->classroom_id) == $classroom->id)>
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
                <option value="{{ $section->id }}" @selected(old('section_id', $account->section_id) == $section->id)>
                    {{ $section->name }}</option>
            @endforeach
            @error('classroom_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </select>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="academic_year">{{ trans('Academic year') }} : <span class="text-danger">*</span></label>
            <select class="custom-select mr-sm-2" name="academic_year">
                <option selected disabled>{{ trans('Choose academic year') }}...</option>
                @php
                    $current_year = date('Y');
                @endphp
                @for ($year = $current_year; $year <= $current_year + 1; $year++)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>
    </div>


</div><br>

<br>
<button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save Data</button>
