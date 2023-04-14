@extends('layouts.master')
@section('css')

@section('title')
Exam
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Exam</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Exam</li>
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
                <button type="button" class="button x-small">
                    <a href="{{ route('exam.create') }}">Add Exam</a>
                </button>

                <br><br>
                <div class="col-xl-12 mb-30">

                    <x-flash_message />
                    <div class="card card-statistics h-100">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered p-0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name Exam</th>
                                            <th>School Grade</th>
                                            <th>Classroom</th>
                                            <th>Section</th>
                                            <th>Subject</th>
                                            <th>Teacher</th>
                                            <th>Update</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($exams as $exam)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $exam->name }}</td>
                                                <td>{{ $exam->schoolgrade->name }}</td>
                                                <td>{{ $exam->classroom->name }}</td>
                                                <td>{{ $exam->section->name }}</td>
                                                <td>{{ $exam->subject->name }}</td>
                                                <td>{{ $exam->teacher->name }}</td>
                                                <td>
                                                    <a href="{{ route('exam.edit', $exam->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('exam.destroy', $exam->id) }}"
                                                        method="post">

                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                        @endforeach
                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
