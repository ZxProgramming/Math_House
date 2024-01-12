<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SessionGroup;
use App\Models\User;

class GroupStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'stu_id',
    ];

    public function group()
    {
        return $this->belongsTo(SessionGroup::class, 'group_id');
    }
    public function student()
    {
        return $this->belongsTo(User::class, 'stu_id');
    }
}
