<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 
        'wallet', 
        'date',
        'image',
        'payment_method_id',
        'state',
        'payment_request_id',
    ];
}
