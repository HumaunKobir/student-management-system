@extends('layouts.app')

@section('content')
 <!-- Content Header (Page header) -->
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
                <h3 class="card-title">Categories DataTable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                   <tr>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th>Action</th>
                   </tr>
                  </thead>
                  
                 <tbody>
                  @foreach($catagori as $key=>$row)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$row->catagori_name}}</td>
                        <td>{{$row->slug_catagori}}</td>
                        <td>
                            <a href="{{route('catagori.edit',$row->id)}}"class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="{{route('catagori.delete',$row->id)}}"class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                   @endforeach
                 </tbody>
                 
                  <tfoot>
                  <tr>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th>Action</th>
                   </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  
@endsection
