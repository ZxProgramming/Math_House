<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Package;
use App\Models\PaymentRequest;

class PaymentPackageOrder extends Model
{
    use HasFactory;

    protected $table = 'payment_package_order';
    
    protected $fillable = [
        'payment_request_id',
        'package_id',
        'discount',
        'state',
        'date',
        'number',
    ];
    
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function package_live()
    {
        return $this->belongsTo(Package::class, 'package_id')
        ->where('module', 'Live');
    }
    public function pay_req()
    {
        return $this->belongsTo(PaymentRequest::class, 'payment_request_id');
    }
}
