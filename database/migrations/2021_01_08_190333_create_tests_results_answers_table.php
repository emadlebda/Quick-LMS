<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsResultsAnswersTable extends Migration {
	public function up()
	{
		Schema::create('tests_results_answers' , function (Blueprint $table) {
			$table->bigIncrements('id');
            $table->foreignId('test_result_id')->constrained('test_results')->cascadeOnDelete();
            $table->foreignId('option_id')->constrained('questions_options')->cascadeOnDelete();
            $table->foreignId('question_id')->constrained('questions')->cascadeOnDelete();
            $table->tinyInteger('is_correct')->default(0);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('tests_results_answers');
	}
}
