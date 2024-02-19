<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Course;
use App\Models\ScoreList;

class ScoreSheet extends Model
{
    use HasFactory;

    protected $table = 'score_sheet';

    protected $fillable = [
        'name',
        'course_id',
        'score',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function score_list()
    {
        return $this->hasMany(ScoreList::class, 'score_id');
    }

}
