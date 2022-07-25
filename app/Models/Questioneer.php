<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questioneer extends Model
{
    use HasFactory;

    protected $table = 'questioneer_keys';

    protected $fillable = [
        'questions_list',
        'questioneer_title',
        'questioneer_description',
        'status',
        'questioneer_key'
    ];
}
