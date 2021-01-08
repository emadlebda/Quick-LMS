<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\QuestionsOption;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class QuestionsOptionFactory extends Factory {
	protected $model = QuestionsOption::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'option_text' => $this->faker->text ,
			'is_correct'  => rand(0,1) ,
		];
	}
}
