<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = 'discount';
    protected $fillable = ['id','code','discount','title','expiration_date'];


    public function products()
{
    return $this->belongsToMany(Product::class);
}
public function user()
{
    return $this->belongsToMany(User::class);
}
}
