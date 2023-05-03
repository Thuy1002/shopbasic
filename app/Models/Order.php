<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'Order';
    protected $fillable = ['code','total_price','id_user','status'];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
