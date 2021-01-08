<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStudentsTable extends Migration {
    public function up()
    {
        if ( ! Schema::hasTable('course_student')) {
            Schema::create('course_student' , function (Blueprint $table) {

                $table->foreignId('user_id')->constrained('users');
                $table->foreignId('course_id')->constrained('courses');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('course_students');
    }
}
