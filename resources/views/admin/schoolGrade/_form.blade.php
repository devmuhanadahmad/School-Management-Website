<div class="row">
    <x-form.input lable="Name Schoole Grade " name="name" :value="$schoolGrade->name" />
  </div><br/>
  <div class="row">
      <x-form.status lable="Status" name="status" :value="$schoolGrade->status" :option="['active'=>'Active','inactive'=>'Inactive']" />
    </div><br/>
    <div class="row">
      <x-form.textarea lable="Note" name="notes" :value="$schoolGrade->notes" />
    </div>




<br>
<button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save Data</button>
