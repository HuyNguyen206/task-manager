@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center">Todos list</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
        <div class="card card-default">
            <div class="card-header">
                Todo
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @forelse($todos as $todo)
                        <li class="list-group-item">
                            {{$todo->name}}
                            <a href="{{route('todos.show', $todo->slug)}}" class="btn btn-primary float-right">View</a>
                        </li>
                    @empty
                        <li class="list-group-item">
                            No item
                        </li>
                        @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
