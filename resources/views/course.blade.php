@extends('layouts.home')
@section('content')
    <div class="row mb-5">
        <a href="#">{{$course->title}}</a>

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
                    <a href="{{route('lessons.show',$lesson->slug)}}">{{$lesson->title}}</a>

                </div>
                <div class="card-body"><p>{{$lesson->short_text}}</p></div>
            </div>
        </div>
    @endforeach
@endsection
