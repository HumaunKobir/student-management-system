@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('classes') }}
                <a href="{{route('students.index')}}" class="btn btn-info" style="float:right">{{__('All Students')}}</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session()->has('success'))
                    <strong class="text-success">{{session()->get('success')}}</strong>
                    @endif
                    <div>
                       
                        <form action="{{route('students.update',$students->id)}}" method="post" >
                        @csrf
                        <input type="hidden"name="_method"value="PATCH">
                        <div class="row mb-3">
                            <label for="student_name" class="col-md-4 col-form-label text-md-end">{{ __('Enter Student Name') }}</label>

                            <div class="col-md-6">
                                <input id="student_name" type="text" class="form-control @error('student_name') is-invalid @enderror" name="student_name"value="{{$students->student_name}}" >

                                @error('student_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="student_roll" class="col-md-4 col-form-label text-md-end">{{ __('Enter Student Roll') }}</label>

                            <div class="col-md-6">
                                <input id="student_roll" type="number" class="form-control @error('student_roll') is-invalid @enderror" name="student_roll" value="{{$students->student_roll}}">

                                @error('student_roll')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="student_phone" class="col-md-4 col-form-label text-md-end">{{ __('Enter Student Contact') }}</label>

                            <div class="col-md-6">
                                <input id="student_phone" type="text" class="form-control @error('student_phone') is-invalid @enderror" name="student_phone" value="{{$students->student_phone}}">

                                @error('student_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="student_email" class="col-md-4 col-form-label text-md-end">{{ __('Enter Student Email') }}</label>

                            <div class="col-md-6">
                                <input id="student_email" type="email" class="form-control @error('student_email') is-invalid @enderror" name="student_email" value="{{$students->student_email}}">

                                @error('student_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="class_id" class="col-md-4 col-form-label text-md-end">{{ __('Enter Class Name') }}</label>

                            <div class="col-md-6">
                                <select name="class_id" id="class_id"class="form-control @error('class_id') is-invalid @enderror"value="{{$students->class_id}}">
                                    @foreach($classes as $row)
                                    <option value="{{$row->id}}"@if($row->id==$students->class_id) selected @endif>{{$row->class_name}}</option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Your Information') }}
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
