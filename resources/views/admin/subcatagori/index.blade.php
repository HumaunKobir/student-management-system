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
                            <h3 class="card-title">Subcategory DataTable</h3>
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        @if(session()->has('success'))
                        <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif
                       <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Subcategory Name</th>
                                    <th>Subcategory Slug</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($subcatagori as $key=>$row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->catagori->catagori_name}}</td>
                                        <td>{{$row->subcatagori_name}}</td>
                                        <td>{{$row->subcatagori_slug}}</td>
                                        <td>
                                            <a href="{{route('subcatagori.edit',$row->id)}}"class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('subcatagori.delete',$row->id)}}"class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
