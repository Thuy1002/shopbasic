<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = ['user_id','products_id','id'];
  
    public function products() {
        return $this->belongsTo(products::class);
    }
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

}
