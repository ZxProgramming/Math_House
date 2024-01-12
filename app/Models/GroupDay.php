<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SessionGroup;

class GroupDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'from',
        'to',
        'group_id',
    ];

    public function session_g()
    {
        return $this->belongsTo(SessionGroup::class, 'group_id');
    }
}
