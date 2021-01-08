@extends('layouts.home')
@section('sidebar')
    <h1 class="my-4">{{$lesson->course->title}}</h1>
    <div class="list-group">
        @foreach($lesson->course->publishedLessons as $list_lesson)
            <a href="{{route('lessons.show',$list_lesson->slug)}}" class="list-group-item"
               @if($list_lesson->id == $lesson->id) style="font-weight: bold" @endif
            >
                {{$loop->iteration}}.{{$list_lesson->title}}
            </a>
        @endforeach
    </div>
@endsection
@section('content')
    <div class="row mb-5">
        <div class="col-md-12">
            <h2>{{$lesson->title}}</h2>

            @if (($lesson->course->students()->where('user_id', auth()->id())->count() > 0) || ($lesson->is_free ==1))
                {!! $lesson->full_text !!}
            @else
                <a href="{{route('courses.show',$lesson->course->slug)}}">Buy course to access full lessons</a>
            @endif

            @if($previous_lesson)
                <p>Previous lesson :
                    <a href="{{route('lessons.show',$previous_lesson->slug)}}">{{$previous_lesson->title}}</a>
                </p>
            @endif
            @if($next_lesson)
                <p>Next lesson :
                    <a href="{{route('lessons.show',$next_lesson->slug)}}">{{$next_lesson->title}}</a>
                </p>
            @endif

        </div>
    </div>
@endsection
