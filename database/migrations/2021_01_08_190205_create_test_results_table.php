<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResultsTable extends Migration {
	public function up()
	{
		Schema::create('test_results' , function (Blueprint $table) {
			$table->bigIncrements('id');
            $table->foreignId('test_id')->constrained('tests')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->integer('test_result');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('test_results');
	}
}
