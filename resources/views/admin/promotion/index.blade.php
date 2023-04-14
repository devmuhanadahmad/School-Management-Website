@extends('layouts.master')
@section('css')

@section('title')
    parent
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Parent</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Parent</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <button type="button" class="button x-small" >
                    <a href="{{route('parent.create')}}">Add Parent</a>
                </button>

                <br><br>
                <div class="col-xl-12 mb-30">
                      {{--
                    <form action="{{ URL::current() }}" method="get">
                        <div class="row col-12 mt-3 mb-3">

                            <x-form.input name="name" type="text" class="col" placeholder="Enter Name Category " :value="request('name')" />
                            <select name="status" class="form-control SlectBox col-6 "
                                @class(['form-control','SlectBox','is-invalid'=>$errors->has('status') ]) onclick="console.log($(this).val())"
                                onchange="console.log('change is firing')"
                                >
                                <!--placeholder-->
                                <option value=""  @selected(request('status') == 'all')>All</option>
                                <option value="active"  @selected(request('status') == 'active')>Active</option>
                                <option value="archive"  @selected(request('status') == 'archive')>Archive</option>

                        </select>
                            <button class="btn btn-primary mr-2">Filter</button>
                        </div>


                    </form>
                    --}}
                    <x-flash_message />
                    <div class="card card-statistics h-100">
                        <div class="card-body">



                                <h6 style="color: red;font-family: Cairo">المرحلة الدراسية القديمة</h6><br>

                            <form method="post" action="{{ route('promotion.store') }}">
                                @csrf
                                <div class="form-row">


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

                                  {{-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="academic_year">
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                @php
                                                    $current_year = date("Y");
                                                @endphp
                                                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                                    <option value="{{ $year}}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
--}}


                                </div>
                                <br><h6 style="color: red;font-family: Cairo">المرحلة الدراسية الجديدة</h6><br>

                                <div class="form-row">

                                    <div class="col">
                                        <label for="inputName" class="control-label">School Grade  </label>
                                        <select name="to_schoolgrade_id" @class([
                                            'form-control ',
                                            'SlectBox',
                                            'is-invalid' => $errors->has('to_schoolgrade_id'),
                                        ])>
                                            <!--placeholder-->
                                            <option value="" selected disabled>Choose School Grade Name..</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}" @selected(old('to_schoolgrade_id', $studant->to_schoolgrade_id) == $grade->id)>
                                                    {{ $grade->name }}</option>
                                            @endforeach
                                            @error('to_schoolgrade_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </select>
                                    </div>


                                    <div class="col">
                                        <label for="inputName" class="control-label">Classroom </label>
                                        <select name="to_classroom_id" @class([
                                            'form-control ',
                                            'SlectBox',
                                            'is-invalid' => $errors->has('to_classroom_id'),
                                        ])>
                                            <!--placeholder-->
                                            <option value="" selected disabled>Choose Classroom Name ..</option>
                                            @foreach ($classrooms as $classroom)
                                                <option value="{{ $classroom->id }}" @selected(old('to_classroom_id', $studant->to_classroom_id) == $classroom->id)>
                                                    {{ $classroom->name }}</option>
                                            @endforeach
                                            @error('to_classroom_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </select>
                                    </div>


                                    <div class="col">
                                        <label for="inputName" class="control-label">Section</label>
                                        <select name="to_section_id" @class([
                                            'form-control ',
                                            'SlectBox',
                                            'is-invalid' => $errors->has('to_section_id'),
                                        ])>
                                            <!--placeholder-->
                                            <option value="" selected disabled>Choose Section Name..</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}" @selected(old('to_section_id', $studant->to_section_id) == $section->id)>
                                                    {{ $section->name }}</option>
                                            @endforeach
                                            @error('to_section_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </select>
                                    </div>


                                   {{--<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="academic_year_new">
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                @php
                                                    $current_year = date("Y");
                                                @endphp
                                                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                                    <option value="{{ $year}}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>


                                </div>--}}
                                <button type="submit" class="btn btn-primary">تاكيد</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <!-- row closed -->
        @endsection
        @section('js')




        @endsection
