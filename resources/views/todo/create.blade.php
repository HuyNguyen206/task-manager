@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center"> Create todo</h1>
        <div class="card card-default">
            <div class="card-header">
                Create todo
            </div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            <div class="card-body">
                <form method="post" action="{{route('todos.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" />
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"  name="description" rows="5">{{old('description')}}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                   <button class="btn btn-primary"> Create todo</button>
                </form>

            </div>
        </div>
    </div>
@endsection
