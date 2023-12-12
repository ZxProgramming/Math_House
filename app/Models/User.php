<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    
    protected $fillable = [
        'user_name',
        'email',
        'phone',
        'position',
        'parent_phone',
        'parent_email',
        'image',
    ]; 

    protected $hidden = [
        'password', 
    ]; 


}
