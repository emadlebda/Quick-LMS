<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory()->count(5)->create()->each(function ($course) {
            $course->teachers()->sync([1]);
            $course->courseLessons()->saveMany(Lesson::factory()->count(10)->create());
        });
    }
}
