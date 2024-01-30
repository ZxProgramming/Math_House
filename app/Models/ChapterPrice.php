<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;

class ChapterPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'duration',
        'price',
        'discount',
        'chapter_id'
    ];
    
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
