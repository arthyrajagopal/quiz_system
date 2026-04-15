<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    protected $fillable = ['user_id'];

    public function answers() {
        return $this->hasMany(Answer::class);
    }
}


