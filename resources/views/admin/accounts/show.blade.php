@extends('layouts.master')
@section('css')

@section('title')
    studants
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> studants</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">studants</li>
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
                                  <th>Name</th>
                                  {{--
                                  <th>Price</th>
                                  <th>School Grade</th>
                                  <th>Classroom</th>
                                   <th>Section</th>
                                  <th>Academic Year</th>
                                  <td>Show Studants</td>
                                  <th>Update</th>
                                  <th>Delete</th>
--}}
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($studants as $studants)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$studants->name}}</td>
                                                                  {{--

                                <td>{{$studants->price}}</td>
                                <td>{{$studants->schoolgrade->name}}</td>
                                <td>{{$studants->classroom->name}}</td>
                                <td>{{$studants->section->name}}</td>
                                <td>{{$studants->academic_year}}</td>
                                <td>
                                    <a href="{{route('account.showstudantsStudants',[$studants->schoolgrade_id,$studants->classroom_id])}}" class="btn btn-warning btn-sm" ><i
                                            class="fa fa-edit"></i></a>
                                        </td>
                                <td>
                                    <a href="{{route('account.edit',$studants->id)}}" class="btn btn-info btn-sm" ><i
                                            class="fa fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('account.destroy',$studants->id)}}" method="post">

                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash"></i></button>
                                    </td>                                 --}}

                                    </form>



                            </tr>

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
