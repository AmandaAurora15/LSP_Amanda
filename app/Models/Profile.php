<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'hero_description',
        'history_title',
        'history_paragraph_one',
        'history_paragraph_two',
        'client_count',
        'uptime',
        'principle',
        'vision',
        'mission_one',
        'mission_two',
        'mission_three',
    ];
}
