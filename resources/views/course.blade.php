@extends('layouts.home')
@section('content')
    <div class="row">
        <h2>{{$course->title}}</h2>

        {{$course->description}}
    </div>
@endsection
