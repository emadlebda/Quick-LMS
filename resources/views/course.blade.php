@extends('layouts.home')
@section('content')
    <div class="row mb-5">
        <h1 class="lead">{{$course->title}}</h1>

        {{$course->description}}

        @if(auth()->check())
            @if ($course->students()->where('user_id', auth()->id())->count() == 0)
                <form action="{{route('courses.payment')}}" method="POST">
                    <input type="hidden" name="course_id" value="{{ $course->id }}"/>
                    <input type="hidden" name="amount" value="{{ $course->price * 100 }}"/>
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{ env('PUB_STRIPE_API_KEY') }}"
                        data-amount="{{ $course->price * 100 }}"
                        data-currency="usd"
                        data-name="Quick LMS"
                        data-label="Buy course (${{ $course->price }})"
                        data-description="Course: {{ $course->title }}"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-zip-code="false">
                    </script>
                    {{ csrf_field() }}
                </form>
            @endif
        @else
            <a href="{{route('register')}}?redirect_url={{route('courses.show',$course->slug)}}"
               class="btn btn-primary">Buy course ({{$course->price}}$)</a>
        @endif
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
