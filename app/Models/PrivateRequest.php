<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class PrivateRequest extends Model
{
    use HasFactory;

    protected $table = 'private_request';

    protected $fillable = [
        'user_id',
        'date',
        'from',
        'to',
        'teacher_id',
        'status',
        'rejected_reason',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
