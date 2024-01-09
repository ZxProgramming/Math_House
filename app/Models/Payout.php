<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Affilate;
use App\Models\PaymentMethod;

class Payout extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'affilate_id',
        'amount',
        'payment_method',
        'statue',
        'rejected_reason',
    ];
    
    public function payment_m()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method');
    }
    
    public function user()
    {
        return $this->belongsTo(Affilate::class, 'affilate_id');
    }
}
