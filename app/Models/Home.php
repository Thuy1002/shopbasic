<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable  = ['title','price','img','status'];
  
    public function Listsp()
    {
      $query = DB::table($this->table)->where('status','!=',2 );
      $list = $query->paginate(6);
      return $list;
    }
    public function loadOne($id,$params = null)
    {
        $query = DB::table($this->table)->where('id','=', $id);
        $obj = $query->first();
        return $obj;
    }
    public function loadwithDm($id){
      $res = DB::table($this->table)->where('id_categories',$id)->where('status','!=',2);
      $list = $res->paginate(6);
      return $list;
    }
  
}
