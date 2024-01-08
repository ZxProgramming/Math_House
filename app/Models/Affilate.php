<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affilate extends Model
{
    use HasFactory;
    protected $table = 'affilate';
    
    protected $fillable = [
        'name', 
        'email',
        'phone', 
        'organization', 
        'wallet', 
    ];
}
