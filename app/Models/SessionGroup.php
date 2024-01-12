<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\GroupStudent;
use App\Models\GroupDay;

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

    public function student()
    {
        return $this->hasMany(GroupStudent::class, 'group_id');
    }

    public function days()
    {
        return $this->hasMany(GroupDay::class, 'group_id');
    }
    // public function quizze()
    // {
    //     return $this->hasMany(quizze::class);
    // }
}
