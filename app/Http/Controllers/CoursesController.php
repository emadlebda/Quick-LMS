<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CoursesController extends Controller {
    public function show($course_slug)
    {
        $course = Course::whereSlug($course_slug)->with('publishedLessons')->whereIsPublished(1)->firstOrFail();
        return view('course' , compact('course'));
    }
}
