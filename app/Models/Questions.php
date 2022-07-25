<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_title',
        'question_answer',
        'question_wrong_answers',
        'question_hints',
        'question_story'
    ];
}
