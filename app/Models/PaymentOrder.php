<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Chapter;
use App\Models\PaymentRequest;

class PaymentOrder extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'payment_request_id',
        'chapter_id',
        'duration',
        'state',
        'discount',
        'date',
    ];
    
    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }
    public function pay_req()
    {
        return $this->belongsTo(PaymentRequest::class, 'payment_request_id');
    }
}
