<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class products extends Model
{
  use HasFactory;
  protected $table = "products";
  protected $fillable = ['id', 'title','price', 'img', 'quantity', 'describe','description_img', 'categories_id', 'discount_product','status'];


  protected $appends = [
    'current_price'
  ];
  public function cartItems()
  {
    return $this->hasMany(CartItem::class);
  }
  public function listsp($params = [])
  {
    $query = DB::table($this->table)->select($this->fillable)->where('status', 1)->orWhere('status', 0);
    $list = $query->paginate(5);
    return $list;
  }

  public function categories()
  {
    return $this->belongsTo(Categories::class);
  }

  public function comment()
  {
    return $this->hasMany(Comment::class);
  }

  public function cart()
  {
    return $this->belongsTo(Cart::class);
  }
  public function listsp_2($params = [])
  {
    $query = DB::table($this->table)->select($this->fillable)->where('status', 1)->orWhere('status', 0)->get();
    return $query;
  }
  public function discount()
  {
    return $this->belongsToMany(discount::class);
  }
  public function saveNew($params)
  {
    $data = array_merge($params['cols']);
    $res = DB::table($this->table)->insertGetId($data);
    return $res;
  }
  public function loadOneSp($id, $params = null)
  {
    $query = DB::table($this->table)->where('id', '=', $id);
    $obj = $query->first();
    return $obj;
  }
  public function SaveSp($params)
  {
    if (empty($params['cols']['id'])) {
      Session::flash('erro', 'không xác định được bản ghi cập nhật');
      return null;
    }
    $data_update = [];
    foreach ($params['cols'] as $colName => $val) {
      if ($colName == 'id') continue;
      if (in_array($colName, $this->fillable)) {
        $data_update[$colName] = (strlen($val) == 0) ? null : $val;
      }
    }
    $res = DB::table($this->table)->where('id', $params['cols']['id'])
      ->update($data_update);
    return $res;
  }
  public function loadwithDm($id)
  {
    $res = DB::table($this->table)->where('categories_id', $id)->where('status', '!=', 2);
    $list = $res->paginate(6);
    return $list;
  }

  public function Xoa($id)
  {
    $res = DB::table($this->table)->where('id', $id)->update(['status' => 2]);
    return $res;
  }

  // public function FunctionName(Request $request)
  // {
  //   $rss = DB::table($this->table)->where('title', 'like', '%' . $request->key . '%')->get();
  //   return $rss;
  // }
}
