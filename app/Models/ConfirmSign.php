<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmSign extends Model
{
    use HasFactory;

    protected $table = 'confirm_sign';

    protected $fillable = [
        'email',
        'code',
    ];
}
