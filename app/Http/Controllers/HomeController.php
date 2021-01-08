<?php

namespace App\Http\Controllers;

use App\Models\Course;

class HomeController extends Controller
{
    /**
     * Show the application Home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::whereIsPublished(1)->orderByDesc('id')->get();
        return view('index',compact('courses'));
    }
}
