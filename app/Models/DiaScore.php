<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\DiaScoreName;

class DiaScore extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'dia_score_id',
        'question',
        'score',
    ];

    public function dia_score()
    {
        return $this->belongsTo(DiaScoreName::class, 'dia_score_id');
    }
}
