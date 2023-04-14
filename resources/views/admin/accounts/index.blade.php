@extends('layouts.master')
@section('css')

@section('title')
    accounts
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Accounts</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Accounts</li>
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
                    <a href="{{route('account.create')}}">Add Accounts</a>
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
                                  <th>Name</th>
                                  <th>Price</th>
                                  <th>School Grade</th>
                                  <th>Classroom</th>
                                   <th>Section</th>
                                  <th>Academic Year</th>
                                  <td>Show Studants</td>
                                  <th>Update</th>
                                  <th>Delete</th>

                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($accounts as $accounts)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$accounts->name}}</td>
                                <td>{{$accounts->price}}</td>
                                <td>{{$accounts->schoolgrade->name}}</td>
                                <td>{{$accounts->classroom->name}}</td>
                                <td>{{$accounts->section->name}}</td>
                                <td>{{$accounts->academic_year}}</td>
                                <td>
                                    <a href="{{route('account.showAccountsStudants',[$accounts->schoolgrade_id,$accounts->classroom_id])}}" class="btn btn-warning btn-sm" ><i
                                            class="fa fa-edit"></i></a>
                                        </td>
                                <td>
                                    <a href="{{route('account.edit',$accounts->id)}}" class="btn btn-info btn-sm" ><i
                                            class="fa fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('account.destroy',$accounts->id)}}" method="post">

                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash"></i></button>
                                    </td>
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
