@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center"> Edit todo</h1>
        <div class="card card-default">
            <div class="card-header">
                Edit todo
            </div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            <div class="card-body">
                <form method="post" action="{{route('todos.update', $todo->slug)}}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', $todo->name)}}" />
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"  name="description" rows="5">{{old('description', $todo->description)}}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                   <button class="btn btn-primary"> Update todo</button>
                </form>

            </div>
        </div>
    </div>
@endsection
