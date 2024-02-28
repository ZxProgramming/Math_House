<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Chapter;

class PaymentOrder extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'payment_request_id',
        'chapter_id',
        'duration',
        'state',
        'discount',
    ];
    
    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }
}
