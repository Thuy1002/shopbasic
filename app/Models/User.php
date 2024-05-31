<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function taoTK($params)
    {
        $data = array_merge($params['cols'], [ //array_ có rồi thì cập nhật không có thì thêm 
            'password' => Hash::make($params['cols']['password']),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            // 'level'=>1,
        ]);
        $res = DB::table('users')->insertGetId($data);
        return $res;
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function cart()
    {
        return $this->hasMany(cart::class);
    }
    public function discount()
    {
        return $this->belongsToMany(discount::class);
    }
    public function carts() {
        return $this->belongsToMany(products::class,Cart::class);
    }
    public function producst() {
        return $this->belongsToMany(products::class);
    }
    public function comment_products() {
        return $this->hasMany(Comment::class);
    }


}
