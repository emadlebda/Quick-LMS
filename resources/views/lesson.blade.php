@extends('layouts.home')
@section('sidebar')
    <h1 class="my-4">{{$lesson->course->title}}</h1>
    <div class="list-group">
        @foreach($lesson->course->publishedLessons as $list_lesson)
            <a href="{{route('lessons.show',[$list_lesson->course_id,$list_lesson->slug])}}" class="list-group-item"
               @if($list_lesson->id == $lesson->id) style="font-weight: bold" @endif>
                {{$loop->iteration}}.{{$list_lesson->title}}
            </a>
        @endforeach
    </div>
@endsection
@section('content')
    <div class="row mb-5">
        <div class="col-md-12">
            <h2>{{$lesson->title}}</h2>

            @if ($purchased_course || $lesson->is_free ==1)
                {!! $lesson->full_text !!}

                @if($test_exists )
                    <hr>
                    @if(!is_null($test_result))
                        <h3 class="text-bold">Test: {{$lesson->test->title}}</h3>
                        <div class="alert alert-info">
                            Your test score is: {{$test_result->test_result}}
                            <br>
                        </div>
                    @else
                        @if($lesson->test->questions()->count() > 0)
                            <form action="{{route('lessons.test',$lesson->slug)}}" method="post">
                                @csrf
                                <h3 class="text-bold">Test: {{$lesson->test->title}}</h3>
                                <br>
                                @foreach($lesson->test->questions as $question)
                                    <b>{{$loop->iteration}}.{{$question->question}}</b>
                                    <br>
                                    @foreach($question->options as $option)
                                        <input type="radio" name="questions[{{$question->id}}]" value="{{$option->id}}">
                                        {{$option->option_text}}
                                        <br>
                                    @endforeach
                                    <br>
                                    <br>
                                @endforeach
                                <input type="submit" value="submit results">
                            </form>
                        @endif
                    @endif
                    <hr>
                @endif

            @else
                <a href="{{route('courses.show',$lesson->course->slug)}}">Buy course to access full lessons</a>
            @endif

            @if($previous_lesson)
                <p>Previous lesson :
                    <a href="{{route('lessons.show',[$previous_lesson->course_id,$previous_lesson->slug])}}">{{$previous_lesson->title}}</a>
                </p>
            @endif
            @if($next_lesson)
                <p>Next lesson :
                    <a href="{{route('lessons.show',[$next_lesson->course_id,$next_lesson->slug])}}">{{$next_lesson->title}}</a>
                </p>
            @endif

        </div>
    </div>
@endsection
