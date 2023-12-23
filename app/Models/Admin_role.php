<?php

namespace App\Models;

use app\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_role extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'admin_role',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
