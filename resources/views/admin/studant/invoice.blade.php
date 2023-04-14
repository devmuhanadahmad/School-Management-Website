@extends('layouts.master')
@section('css')
@section('title')
    {{ trans('Invoice') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Invoice') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('invoice.update', $studant->id) }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">Add Invoice</h6><br>

                    <div class="row">
                        <x-form.input lable="Studant Name " name="name" :value="$studant->name" readonly/>
                    </div>

                    <x-form.input name="studant_id" :value="$studant->id" type="hidden" />


                        <div class="form-contrl row">
                            <div class="col">
                                <label for="inputName" class="control-label">Choose Accounts </label>
                                <select name="account_id[]" @class([
                                    'form-control ',
                                    'SlectBox',
                                    'is-invalid' => $errors->has('account_id'),
                                ]) multiple>
                                    <!--placeholder-->
                                    <option value="" selected disabled>Choose Parents Name ..</option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}" @selected(old('account_id', $studant->account_id) == $account->id)>
                                           Acount : {{ $account->name }} || price :  {{ $account->price }}</option>
                                    @endforeach
                                    @error('account_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </select>
                            </div>

                        </div><br>
                    <div class="row">
                        <x-form.textarea lable="Notes" name="notes" :value="$studant->notes" />
                    </div><br />





                    <br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save Data</button>

                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
