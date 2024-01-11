@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('classes') }}
                <a href="{{route('classes.index')}}" class="btn btn-info" style="float:right">{{__('All Classes')}}</a>
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
                       
                        <form action="{{route('classes.store')}}" method="post" >
                        @csrf
                        <div class="row mb-3">
                            <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('Enter class Name') }}</label>

                            <div class="col-md-6">
                                <input id="class" type="text" class="form-control @error('class_name') is-invalid @enderror" name="class_name" >

                                @error('class_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Your Information') }}
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
