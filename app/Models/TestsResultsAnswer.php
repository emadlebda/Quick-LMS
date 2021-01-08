<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestsResultsAnswer extends Model {
    protected $fillable=['test_result_id','question_id','option_id','is_correct'];

}
