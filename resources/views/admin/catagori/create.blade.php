@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category') }}
                
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
                       
                        <form action="{{route('catagori.store')}}" method="post" >
                        @csrf
                        <div class="row mb-3">
                            <label for="categori" class="col-md-4 col-form-label text-md-end">{{ __('Enter Category') }}</label>

                            <div class="col-md-6">
                                <input id="catagori" type="text" class="form-control @error('catagori_name') is-invalid @enderror" name="catagori_name" value="{{old('catagori_name')}}">

                                @error('catagori_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Your Category') }}
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
