<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];
    protected $fillable = ['order_id', 'customer_id'];

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
