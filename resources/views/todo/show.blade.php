@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center">{{$todo->name}}</h1>
        <div class="card card-default">
            <div class="card-header">
                {{$todo->name}}
            </div>
            <div class="card-body">
                <p>
                    {{$todo->description}}
                </p>
            </div>
        </div>
    </div>
@endsection
