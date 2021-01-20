@extends('layouts.home')
@section('content')
    <div class="row mb-5">
        <div class="col-md-12">

            <h1 class="">{{$course->title}}</h1>
            <div class="text-danger float-right">Rating : {{$course->rating}} out of 5</div>


            @if((auth()->check()) && ($course->students()->where('user_id', auth()->id())->count() > 0))
                <span>Rate the course</span>
                <form action="{{route('courses.rating',$course->id)}}" method="post">
                    @csrf
                    <select name="rating">
                        <option value="1">1 - Awful</option>
                        <option value="2">2 - Not too good</option>
                        <option value="3">3 - Average</option>
                        <option value="4" selected>4 - Quite good</option>
                        <option value="5">5 - Awesome!</option>
                    </select>
                    <input type="submit" value="Rate">
                </form>
            @endif


            <p class="mt-4">{{$course->description}}</p>

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
