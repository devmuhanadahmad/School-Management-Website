@extends('layouts.master')
@section('css')

@section('title')
    Studant
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Studant</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Studant</li>
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
                    <a href="{{route('studant.create')}}">Add Studant</a>
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
                        <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                          <thead>
                              <tr>
                                  <th>Id</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Gender</th>
                                  <th>School Grade</th>
                                  <th>Classroom</th>
                                   <th>Section</th>
                                   <th>Show</th>
                                  <th>Update</th>
                                  <th>Delete</th>

                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($studants as $studant)
                            <tr>
                                <td>{{$studant->id}}</td>
                                <td>{{$studant->name}}</td>
                                <td>{{$studant->email}}</td>
                                <td>{{$studant->gender}}</td>
                                <td>{{$studant->schoolgrade->name}}</td>
                                <td>{{$studant->classroom->name}}</td>
                                <td>{{$studant->section->name}}</td>
                                <td>
                                    <a href="{{route('studant.show',$studant->id)}}" class="btn btn-warning btn-sm" ><i
                                            class="fa fa-edit"></i></a>
                                        </td>
                                <td>
                                    <a href="{{route('studant.edit',$studant->id)}}" class="btn btn-info btn-sm" ><i
                                            class="fa fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('studant.destroy',$studant->id)}}" method="post">

                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash"></i></button>
                                    </form>
                                    </td>

                                    <td>
                                        <a href="{{route('invoice.edit',$studant->id)}}" class="btn btn-warning btn-sm" ><i
                                                class="fa fa-edit"></i></a>
                                            </td>


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
