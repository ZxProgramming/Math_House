<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Lesson;
use App\Models\SessionGroup;
use App\Models\SessionDay;

class Session extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'date', 
        'name',
        'link', 
        'material_link',
        'from', 
        'to', 
        'lesson_id', 
        'teacher_id', 
        'group_id',
        'type', 
        'price',
        'access_dayes',
        'repeat',
    ];
 
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
 
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
 
    public function group()
    {
        return $this->belongsTo(SessionGroup::class, 'group_id');
    }
 
    public function users()
    {
        return $this->belongsToMany(User::class, 'session_students');
    }
 
    public function user_attend()
    {
        return $this->belongsToMany(User::class, 'session_attendance')
        ->where('user_id', auth()->user()->id);
    }

    public function days(){
        return $this->hasMany(SessionDay::class, 'session_id');
    }

}
