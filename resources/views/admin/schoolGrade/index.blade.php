@extends('layouts.master')
@section('css')

@section('title')
    School Grade
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> School Grade</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">School Grade</li>
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
                    <a href="{{route('schoolGrade.create')}}">Add School Grade</a>
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
                                  <th>Status</th>
                                  <th>Notes</th>
                                  <th>Created At</th>
                                  <th>Update</th>
                                  <th>Delete</th>

                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($schoolGrade as $grade)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$grade->name}}</td>
                                <td>
                                    @if($grade->status == 'active')
                                    <p class="text-success">{{$grade->status}}</p>
                                    @else
                                    <p class="text-danger">{{$grade->status}}</p>
                                    @endif
                                </td>
                                <td>{{$grade->notes}}</td>
                                <td>{{$grade->created_at}}</td>
                                <td>
                                    <a href="{{route('schoolGrade.edit',$grade->id)}}" class="btn btn-info btn-sm" ><i
                                            class="fa fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('schoolGrade.destroy',$grade->id)}}" method="post">

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
