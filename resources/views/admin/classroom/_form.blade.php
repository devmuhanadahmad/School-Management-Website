<div class="row">
    <x-form.input lable="Name Schoole Grade " name="name" :value="$classroom->name" />
  </div><br/>
  <div class="row">
      <x-form.status lable="Status" name="status" :value="$classroom->status" :option="['active'=>'Active','inactive'=>'Inactive']" />
    </div><br/>
    <div class="row">
      <x-form.textarea lable="Note" name="notes" :value="$classroom->notes" />
    </div>
    <div class="form-contrl">

      <label for="inputName" class="control-label">School Grade </label>
      <select name="schoolgrade_id" @class([
          'form-control ',
          'SlectBox',
          'is-invalid' => $errors->has('schoolgrade_id'),
      ])>
          <!--placeholder-->
          <option value="" selected disabled>Choose School Grade</option>
          @foreach ($grades as $grades)
              <option value="{{ $grades->id }}" @selected(old('schoolgrade_id', $classroom->schoolgrade_id) == $grades->id)>
                  {{ $grades->name }}</option>
          @endforeach
          @error('specialization_id')
              <small class="text-danger">{{ $message }}</small>
          @enderror
      </select>
  </div>

<br>
<button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save Data</button>
