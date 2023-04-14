@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
School Grade
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
School Grade
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

                <form method="post"  action="{{ route('schoolGrade.update',$schoolGrade) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">Edit School Grade</h6><br>
                       @include('admin.schoolGrade._form')
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
   
@endsection
