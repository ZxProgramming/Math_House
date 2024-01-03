<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdeaLesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'idea',
        'syllabus',
        'idea_order',
        'pdf',
        'v_link',
        'lesson_id',
    ];
}
