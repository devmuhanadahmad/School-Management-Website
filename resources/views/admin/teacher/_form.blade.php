<div class="row">
    <x-form.input lable="Name Schoole Grade " name="name" :value="$teacher->name" />
</div>
<div class="row">
    <x-form.input lable="email " name="email" type="email" :value="$teacher->email" />
    <x-form.input lable="password" name="password" type="password" :value="$teacher->password" />
</div>
<div class="row">
        <x-form.input lable="Joining Date" name="joiningDate" type="date" :value="date('Y-m-d')" />
    <x-form.status lable="Gender" name="gender" :value="$teacher->status" :option="['male' => 'Male', 'female' => 'Female']" />
</div><br />
<div class="row">
    <x-form.textarea lable="Address" name="address" :value="$teacher->address" />
</div>

<div class="form-contrl">

    <label for="inputName" class="control-label">Specialization </label>
    <select name="specialization_id" @class([
        'form-control ',
        'SlectBox',
        'is-invalid' => $errors->has('specialization_id'),
    ])>
        <!--placeholder-->
        <option value="" selected disabled>Primary category</option>
        @foreach ($Specializations as $category)
            <option value="{{ $category->id }}" @selected(old('specialization_id', $teacher->specialization_id) == $category->id)>
                {{ $category->name }}</option>
        @endforeach
        @error('specialization_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </select>
</div>


<br>
<button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save Data</button>
