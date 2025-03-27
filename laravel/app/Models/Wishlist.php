<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];
    protected $fillable = ['product_id', 'custmoer_id'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
}
