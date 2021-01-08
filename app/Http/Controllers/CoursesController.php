<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CoursesController extends Controller {
	public function show($course_slug)
	{
		$course = Course::whereSlug($course_slug)->firstOrFail();
		return view('course',compact('course'));
	}
}
