@extends('layouts.app')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Students DataTable</h3>
                        </div>
                       <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th>SL</th>
                                    <th>Class Name</th>
                                    <th>Student Name</th>
                                    <th>Student Roll</th>
                                    <th>Student Contact</th>
                                    <th>Student Email</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($students as $key=>$row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->classes->class_name}}</td>
                                        <td>{{$row->student_name}}</td>
                                        <td>{{$row->student_roll}}</td>
                                        <td>{{$row->student_phone}}</td>
                                        <td>{{$row->student_email}}</td>
                                        
                                        <td>
                                            <a href="{{route('students.edit',$row->id)}}"class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('students.destroy',$row->id)}}"method="post">
                                                @csrf
                                                <input type="hidden"name="_method"value="DELETE">
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
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
    </section>
@endsection
