@extends('layouts.home')
@section('content')
    <div class="row mb-5">
        <h2>{{$course->title}}</h2>

        {{$course->description}}
    </div>

    @foreach($course->publishedLessons as $lesson)
        <div class="row mb-2">
            <div class="card">
                <div class="card-header">
                    {{$loop->iteration}}
                    @if($lesson->is_free)
                        (FREE!!)
                    @endif
                    {{$lesson->title}}
                </div>
                <div class="card-body"><p>{{$lesson->short_text}}</p></div>
            </div>
        </div>
    @endforeach
@endsection
