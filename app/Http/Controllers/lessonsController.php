<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\QuestionsOption;
use App\Models\TestResult;
use Illuminate\Http\Request;

class lessonsController extends Controller {
    public function show($lesson_slug)
    {
        $lesson = Lesson::whereSlug($lesson_slug)->whereIsPublished(1)->firstOrFail();

        if (auth()->check() && ( $lesson->students()->where('users.id' , auth()->id())->count() == 0 ))
            $lesson->students()->attach(auth()->id());

        $test_result = null;
        if ($lesson->test)
            $test_result = TestResult::whereTestId($lesson->test->id)
                                     ->whereUserId(auth()->id())
                                     ->first();

        $previous_lesson = Lesson::whereCourseId($lesson->course_id)
                                 ->where('position' , '<' , $lesson->position)
                                 ->orderByDesc('position')
                                 ->first();
        $next_lesson = Lesson::whereCourseId($lesson->course_id)
                             ->where('position' , '>' , $lesson->position)
                             ->orderBy('position')
                             ->first();

        return view('lesson' , compact('lesson' , 'previous_lesson' , 'next_lesson' , 'test_result'));
    }

    /*
    * Save the answer
    * Check if it is correct and then add points
    * Save all test result and show the points
    */
    public function test($lesson_slug , Request $request)
    {
        $lesson = Lesson::whereSlug($lesson_slug)->firstOrFail();
        $answers = [];
        $test_score = 0;
        foreach ($request->get('questions') as $question_id => $answer_id) {
            $question = Question::find($question_id);
            $correct = QuestionsOption::whereQuestionId($question_id)
                                      ->whereId($answer_id)
                                      ->whereIsCorrect(1)
                                      ->count() > 0;
            $answers[] = [
                'question_id' => $question_id ,
                'option_id'   => $answer_id ,
                'is_correct'  => $correct ,
            ];
            if ($correct) {
                $test_score += $question->score;
            }

        }
        $test_result = TestResult::create([
            'test_id'     => $lesson->test->id ,
            'user_id'     => \Auth::id() ,
            'test_result' => $test_score ,
        ]);
        $test_result->answers()->createMany($answers);

        return redirect()->route('lessons.show' , $lesson_slug)->with('message' , 'Test score: ' . $test_score);
    }
}
