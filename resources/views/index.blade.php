@extends('layouts.home')
@section('content')
    @if(!is_null($purchased_courses))
        <h3>My courses</h3>
        <br>
        <div class="row mb-4">

            @foreach($purchased_courses as $course)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{route('courses.show',$course->slug)}}">{{$course->title}}</a>
                            </h5>
                            <p class="card-text">{{$course->description}}</p>
                            <small class="text-danger float-left">
                                <p>progress: {{auth()->user()->lessons()->where('course_id',$course->id)->count()}}
                                    of {{$course->lessons->count()}} lessons</p>
                            </small>
                            {{--                            <a href="#" class="btn btn-primary float-right">Go somewhere</a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <h3>All courses</h3>
    <br>

    <div class="row mb-4">
        @foreach($courses as $course)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{route('courses.show',$course->slug)}}">{{$course->title}}</a>
                        </h5>
                        <h5>{{$course->price}} $</h5>
                        <p class="card-text">{{$course->description}}</p>

                        <p class="float-left">
                            @for($star=1; $star<=5;$star++)
                                @if($course->rating >=$star)
                                    <span class="text-danger">
                                        <i class="fas fa-star"></i>
                                    </span>
                                @else
                                    <span class="text-danger">
                                        <i class="far fa-star"></i>
                                    </span>
                                @endif
                            @endfor
                        </p>

                        <p class="float-right text-info">Students: {{$course->students()->count()}} </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
