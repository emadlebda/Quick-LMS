@extends('layouts.home')
@section('content')
    <div class="row mb-5">
        <h1 class="lead">{{$course->title}}</h1>

        {{$course->description}}

        <a href="{{route('register')}}?redirect_url={{route('courses.show',$course->slug)}}"
           class="btn btn-primary">Buy course ({{$course->price}}$)</a>
    </div>

    @foreach($course->publishedLessons as $lesson)
        <div class="row mb-2">
            <div class="card">
                <div class="card-header">
                    {{$loop->iteration}}
                    @if($lesson->is_free)
                        (FREE!!)
                    @endif
                    <a href="{{route('lessons.show',$lesson->slug)}}">{{$lesson->title}}</a>

                </div>
                <div class="card-body"><p>{{$lesson->short_text}}</p></div>
            </div>
        </div>
    @endforeach
@endsection
