<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LessonFactory extends Factory {
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'        => $name = $this->faker->text(50) ,
            'slug'         => \Str::slug($name) ,
            'short_text'   => $this->faker->paragraph ,
            'full_text'    => $this->faker->text(1000) ,
            'position'     => rand(1 , 10) ,
            'is_free'      => rand(0 , 1) ,
            'is_published' => rand(0 , 1) ,
        ];
    }
}
