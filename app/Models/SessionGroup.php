<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class SessionGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'teacher_id', 
        'state',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    // public function quizze()
    // {
    //     return $this->hasMany(quizze::class);
    // }
}
