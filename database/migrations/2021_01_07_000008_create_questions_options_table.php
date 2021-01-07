<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('option_text');
            $table->boolean('is_correct')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
