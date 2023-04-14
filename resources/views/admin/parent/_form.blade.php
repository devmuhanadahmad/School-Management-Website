<div class="row">
    <x-form.input lable="Email " name="Email" type="email" :value="$parent->Email" />
    <x-form.input lable="Password" name="Password" type="password" :value="$parent->Password" />
</div>
<br>
<div>
    <h5 class="text-success">Personal information Father</h5>
</div>

<div class="row">
    <x-form.input lable="Name Father" name="Name_Father" :value="$parent->Name_Father" />
        <x-form.input lable="Nationality Father" name="Nationality_Father_id" type="number" :value="$parent->Nationality_Father_id" />
            <x-form.input lable="Passport Father" name="Passport_ID_Father" type="number" :value="$parent->Passport_ID_Father" />
                <x-form.input lable="Phone Father" name="Phone_Father" type="number" :value="$parent->Phone_Father" />

</div><br>

<div class="row">
    <x-form.input lable="Language Father" name="Language_Father" :value="$parent->Language_Father" />
        <x-form.input lable="National Father" name="National_ID_Father"  :value="$parent->National_ID_Father" />
                <x-form.input lable="Religion Father_id" name="Religion_Father_id" :value="$parent->Religion_Father_id" />
                    <x-form.status lable="Blood Type Father" name="Blood_Type_Mother_id" :value="$parent->Blood_Type_Mother_id" :option="['-o'=>'-O','+o'=>'+O']" />


</div><br />

<div class="row">
    <x-form.textarea lable="Address Father" name="Address_Father" :value="$parent->Address_Father" />
</div><br />



<div>
    <h5 class="text-success">Personal information Mather</h5>
</div>

<div class="row">
    <x-form.input lable="Name Mother" name="Name_Mother" :value="$parent->Name_Mother" />
        <x-form.input lable="Nationality Mother" name="National_ID_Mother" type="number" :value="$parent->National_ID_Mother" />
            <x-form.input lable="Passport Mother" name="Passport_ID_Mother" type="number" :value="$parent->Passport_ID_Mother" />
                <x-form.input lable="Phone Mother" name="Phone_Mother" type="number" :value="$parent->Phone_Mother" />

</div><br>

<div class="row">
    <x-form.input lable="Language Mother" name="Language_Mother" :value="$parent->Language_Mother" />
        <x-form.input lable="National Mother" name="Nationality_Mother_id"  :value="$parent->Nationality_Mother_id" />
                <x-form.input lable="Religion Mother" name="Religion_Mother_id" :value="$parent->Religion_Mother_id" />
                    <x-form.status lable="Blood Type Mother" name="Blood_Type_Mother_id" :value="$parent->Blood_Type_Mother_id" :option="['-o'=>'-O','+o'=>'+O']" />


</div><br />

<div class="row">
    <x-form.textarea lable="Address Father" name="Address_Mother" :value="$parent->Address_Mother" />
</div><br />




<br>
<button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save Data</button>


