<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name'];

    public function attempts() {
        return $this->hasMany(QuizAttempt::class);
    }
}


