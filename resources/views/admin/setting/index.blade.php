@extends('layouts.master')
@section('css')

@section('title')
   Setting
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Setting
@stop
<!-- breadcrumb -->
@endsection
@section('content')


    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <x-flash_message />
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form action="{{ route('setting.update',$setting) }}" method="post" enctype="multipart/form-data"
                autocomplete="off">
                @csrf
                @method('put')
                    <div class="row">
                        <div class="col-md-6 border-right-2 border-right-blue-400">

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Name School <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input name="title" value="{{ old('title',$setting->title) }}" required type="text" class="form-control" placeholder="Name of School">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="current_session" class="col-lg-3 col-form-label font-weight-semibold"> Current Session<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <select data-placeholder="Choose..." required name="current_session" id="current_session" class="select-search form-control">
                                        <option value=""></option>
                                        @for($y=date('Y', strtotime('- 3 years')); $y<=date('Y', strtotime('+ 1 years')); $y++)
                                            <option {{ ($setting->current_session == (($y-=1).'-'.($y+=1))) ? 'selected' : '' }}>{{ ($y-=1).'-'.($y+=1) }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Phone</label>
                                <div class="col-lg-8">
                                    <input name="phone" value="{{old('phone', $setting->phone) }}" type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold"> Email</label>
                                <div class="col-lg-8">
                                    <input name="email" value="{{ old('email',$setting->email)}}" type="email" class="form-control" placeholder="School Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Address <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input required name="address" value="{{old('address', $setting->address) }}" type="text" class="form-control" placeholder="School Address">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">End First Term</label>
                                <div class="col-lg-8">
                                    <input name="end_first_term" value="{{old('end_first_term', $setting->end_first_term) }}" type="date" class="form-control date-pick" placeholder="Date Term Ends">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">  End Secand Term</label>
                                <div class="col-lg-8">
                                    <input name="end_secand_term" value="{{old('end_secand_term',$setting->end_secand_term) }}" type="date" class="form-control date-pick" placeholder="Date Term Ends">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Facebbok</label>
                                <div class="col-lg-8">
                                    <input name="facebbok" value="{{ old('facebbok',$setting->facebbok)}}" type="text" class="form-control" placeholder="facebbok">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Twiter</label>
                                <div class="col-lg-8">
                                    <input name="twiter" value="{{ old('twiter',$setting->twiter)}}" type="text" class="form-control" placeholder="twiter">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Instagram</label>
                                <div class="col-lg-8">
                                    <input name="instagram" value="{{ old('instagram',$setting->instagram) }}" type="text" class="form-control" placeholder="instagram">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Logo </label>
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <img style="width: 100px" height="100px" src="{{ asset('storage/'. $setting->logo) }}" alt="logo">
                                    </div>
                                    <input name="logo" accept="image/*" type="file" class="file-input" data-show-caption="false" data-show-upload="false" data-fouc>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Favicon </label>
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <img style="width: 100px" height="100px" src="{{ asset('storage/'. $setting->favicon) }}" alt="favicon">
                                    </div>
                                    <input name="favicon" accept="image/*" type="file" class="file-input" data-show-caption="false" data-show-upload="false" data-fouc>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Save Data')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
