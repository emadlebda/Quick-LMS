<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class CoursesController extends Controller {
    public function show($course_slug)
    {
        $course = Course::whereSlug($course_slug)->with('publishedLessons')->whereIsPublished(1)->firstOrFail();

        $purchased_course = auth()->check() && $course->students()->where('user_id' , auth()->id())->count() > 0;

        return view('course' , compact('course','purchased_course'));
    }


    public function payment(Request $request)
    {
        $course = Course::findOrFail($request->course_id);

        $this->createStripeCharge($request);

        $course->students()->attach(auth()->id());

        return redirect()->back()->with('success' , 'Payment completed successfully');
    }

    private function createStripeCharge($request)
    {
        Stripe::setApiKey(env('STRIPE_API_KEY'));
        try {
            $customer = Customer::create([
                'email'  => $request->input('stripeEmail') ,
                'source' => $request->input('stripeToken') ,
            ]);
            $charge = Charge::create([
                'customer' => $customer->id ,
                'amount'   => $request->amount ,
                'currency' => 'usd' ,
            ]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception)->send();
        }
    }

    public function rate(Request $request , $id)
    {
        $course = Course::findOrFail($id);
        $course->students()->updateExistingPivot(auth()->id() , ['rating' => $request->get('rating')]);

        return redirect()->back()->with('success' , 'Thank you for your rating !');

    }
}
