<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionsOption;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder {

	public function run()
	{
        Question::factory()->count(50)->create()->each(function ($question) {
            $question->options()->saveMany(QuestionsOption::factory()->count(4)->create());
            $question->tests()->attach(rand(1,50));
        });
	}
}
