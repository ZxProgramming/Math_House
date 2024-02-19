<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ScoreSheet;

class ScoreList extends Model
{
    use HasFactory;

    protected $table = 'score_list';

    protected $fillable = [
        'score_id',
        'question_num',
        'score',
    ];

    public function score()
    {
        return $this->belongsTo(ScoreSheet::class, 'score_id');
    }

}
