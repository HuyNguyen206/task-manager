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
                            <div class="btn btn-group float-right flex align-items-center">
                                <a href="{{route('todos.show', $todo->slug)}}" class="btn btn-primary mr-2">View</a>
                                @if($todo->completed)
                                    <i class="fas fa-check mr-2" style="color: green;"></i>
                                @else
                                <a href="{{route('todos.complete', $todo->slug)}}" class="btn btn-primary mr-2 ">Mark complete</a>
                                @endif
                                <form id="delete-form-{{$todo->id}}" method="post" action="{{route('todos.destroy', $todo->slug)}}">
                                    @csrf
                                    @method('delete')
{{--                                    <button class="btn btn-danger float-right" onclick="event.preventDefault();if(confirm('Are you sure?')){document.querySelector('#delete-form-{{$todo->id}}').submit() }">Delete</button>--}}
                                    <a class="btn btn-danger float-right" onclick="if(confirm('Are you sure?')){document.querySelector('#delete-form-{{$todo->id}}').submit() }">Delete</a>
                                </form>
                            </div>

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
