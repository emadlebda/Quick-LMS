<?php

namespace App\Http\Controllers;

use App\Models\Course;

class HomeController extends Controller {

    public function index()
    {
        $purchased_courses = null;
        if (auth()->check()) {
            $purchased_courses = Course::whereHas('students' , function ($query) {
                $query->where('id' , auth()->id());
            })->orderByDesc('id')
                ->with('lessons')
                ->get();
        }
        $courses = Course::whereIsPublished(1)->orderByDesc('id')->get();
        return view('index' , compact('courses','purchased_courses'));
    }
}
