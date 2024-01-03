<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Course;
use App\Models\Category;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $fillable = [
        'name',
        'f_name',
        'l_name',
        'city_id',
        'grade',
        'email',
        'phone',
        'parent_phone',
        'parent_email',
        'image',
        'position',
        'password',
        'last_login_at',
        'last_login_ip',
        'profile_photo_path',
        'course_id',
        'category_id',
        'extra_email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
    ];

    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo_path) {
            return asset('storage/' . $this->profile_photo_path);
        }

        return $this->profile_photo_path;
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getDefaultAddressAttribute()
    {
        return $this->addresses?->first();
    }
}
