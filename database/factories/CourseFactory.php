<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CourseFactory extends Factory {
	protected $model = Course::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'title'        => $title = $this->faker->sentence ,
			'slug'         => \Str::slug($title) ,
			'description'  => $this->faker->text ,
			'price'        => $this->faker->randomFloat() ,
			'is_published' => 1 ,
		];
	}
}
