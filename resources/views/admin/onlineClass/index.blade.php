@extends('layouts.master')
@section('css')

@section('title')
Online Class
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Online Class</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active"> Online Class</li>
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
                    <a href="{{ route('onlineClass.create') }}">Add  Online Class</a>
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
                                            <th>School Grade</th>
                                            <th>Classroom</th>
                                            <th>Section</th>
                                            <th>User</th>
                                            <th>title</th>
                                            <th>Date & Time</th>
                                            <th>Duration</th>
                                            <th>Join Url</th>
                                            <th>Update</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($onlineClass as $onlineClass)
                                            <tr>
                                                <td>{{ $onlineClass->id }}</td>
                                                <td>{{ $onlineClass->schoolgrade->name }}</td>
                                                <td>{{ $onlineClass->classroom->name }}</td>
                                                <td>{{ $onlineClass->section->name }}</td>
                                                <td>{{ $onlineClass->user->name }}</td>
                                                <td>{{ $onlineClass->topic }}</td>
                                                <td>{{ $onlineClass->start_at }}</td>
                                                <td>{{ $onlineClass->duration }}</td>
                                                <td><a href="{{$onlineClass->start_url}}" class="text-success" target="_blank">Join Url</a></td>

                                                <td>
                                                    <a href="{{ route('onlineClass.edit', $onlineClass->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('onlineClass.destroy', $onlineClass->meeting_id) }}"
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
