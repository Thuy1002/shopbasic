<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Banner extends Model
{
    use HasFactory;
    protected  $table = 'banner';
    protected $fillable = ['id', 'title','img'];
    public function listBanner($params = []) //show theo phân trang
    {
      $query = DB::table($this->table)->select($this->fillable)->where('status', 1);
      $listdm = $query->paginate(5);
      return $listdm;
    }
  
  
  
    public function LBanner() //show danh sách
    {
      $query = DB::table($this->table)->where('status', 1)->get();
      return $query;
    }
  
    public function saveBanner($params)
    {
        $data = array_merge($params['cols']);
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
    public function loadOneBanner($id,$params = null)
    {
        $query = DB::table($this->table)->where('id','=', $id);
        $obj = $query->first();
        return $obj;
    }
    public function SaveupdateBanner($params)
    {
      if(empty($params['cols']['id'])){
        Session::flash('erro','không xác định được bản ghi cập nhật');
        return null;
      }
      $data_update = [];
      foreach($params['cols'] as $colName =>$val){
        if($colName == 'id') continue;
        if(in_array($colName,$this->fillable)){
            $data_update[$colName] = (strlen($val) == 0)? null : $val;

        }
      }
      $res = DB::table($this->table)->where('id',$params['cols']['id'])
      ->update($data_update);
      return $res;
    }
    public function Xoa($id)
    {
      $res= DB::table($this->table)->where('id',$id)->update(['status'=>0]) ;
      return $res;
    }
  
}
