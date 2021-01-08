<?php

namespace App\Http\Controllers;

use App\Models\Lesson;

class lessonsController extends Controller {
    public function show($lesson_slug)
    {
        $lesson = Lesson::whereSlug($lesson_slug)->whereIsPublished(1)->firstOrFail();
        $previous_lesson = Lesson::whereCourseId($lesson->course_id)
                                 ->where('position' , '<' , $lesson->position)
                                 ->orderByDesc('position')
                                 ->first();
        $next_lesson = Lesson::whereCourseId($lesson->course_id)
                             ->where('position' , '>' , $lesson->position)
                             ->orderBy('position')
                             ->first();
        return view('lesson' , compact('lesson','previous_lesson','next_lesson'));
    }
}
