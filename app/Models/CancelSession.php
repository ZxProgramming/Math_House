<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Session;

class CancelSession extends Model
{
    use HasFactory;

    protected $table = 'cancel_session';
     
    protected $fillable = [
        'user_id',
        'session_id',
        'statue', 
        'date',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }
}
