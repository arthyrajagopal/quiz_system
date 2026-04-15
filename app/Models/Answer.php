<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $timestamps = false;
    protected $fillable = ['quiz_attempt_id','question_id','option_id'];
}


