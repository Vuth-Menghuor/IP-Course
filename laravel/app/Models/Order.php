<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];
    protected $fillable = ['order_date', 'total_price', 'customer_id'];

    protected function orderDate(): Attribute
    {
        return Attribute::make(
            // Mutator: Convert input format to MySQL formate before saving
            set: fn($value) => Carbon::createFromFormat('d/m/Y H:i:s', $value)->format('Y-m-d H:i:s'),

            // Accessor: Convert  database format to user format when retrieving 
            get: fn($value) => Carbon::parse($value)->format('d/m/Y H:i:s')
        );
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function order_products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
