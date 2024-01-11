@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sub Category Update') }}
               
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
                       
                        <form action="{{route('subcatagori.update',$subcatagori->id)}}" method="post" >
                        @csrf
                        <div class="row mb-3">
                            <label for="categori" class="col-md-4 col-form-label text-md-end">{{ __('Choose    Category') }}</label>

                            <div class="col-md-6">
                            <select name="catagori_id" id=""class="form-control @error('catagori_id') is-invalid @enderror">
                                @foreach($catagori as $row)
                                <option value="{{$row->id}}"@if($row->id==$subcatagori->catagori_id) selected @endif>{{$row->name}}</option>
                                @endforeach
                            </select>

                                @error('catagori_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><br><br>
                            <label for="categori" class="col-md-4 col-form-label text-md-end">{{ __('Enter Sub Category') }}</label>

                            <div class="col-md-6">
                                <input id="catagori" type="text" class="form-control @error('subcatagori_name') is-invalid @enderror" name="subcatagori_name" value="{{$subcatagori->subcatagori_name}}">

                                @error('subcatagori_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update SubCategory') }}
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
