<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\DiaScore;

class DiaScoreName extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];

    public function scores(){
        return $this->hasMany(DiaScore::class, 'dia_score_id');
    }
}
