<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $table = 'cart_item';
    protected $fillable = ['id','cart_id','quantity','product_id'];

    public function cart()
    {
        return $this->belongsTo(Cart::class,'cart_id');
    }

    public function product()
    {
        return $this->belongsTo(products::class,'product_id');
    }
}
