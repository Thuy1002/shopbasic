<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\SanphamRequest;
use App\Models\categories;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class spController extends Controller
{
    
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index(Request $request ){
        $this->v['extParams'] = $request->all();
        $products = products::join('categories', 'products.id_categories', '=', 'categories.id')
        ->select('products.*', 'categories.title as category_name')
        ->paginate(5);
        return view('admin.sanpham.index',$this->v, compact('products'));
    }


    public function add(SanphamRequest $request){
        $this->v['_title'] = "them nguoi dung";
        $method_route = 'route_BackEnd_Sanpham_Add';
        $method_route_index = 'route_BackEnd_Sanpham_Index';
        $dm = new categories();
            $this->v['tieude']= "thêm sản phẩm";
            // dd($dm->categories());
            $this->v['dm'] = $dm->categories();
    
        if($request->isMethod('post')){ // check nếu là post chạy cậu lệnh dưới
            $params = [];
            $params['cols'] = array_map(function($item){ //array_map chạy lần lượt qua các phần tử của mảng
              if($item == '')
                $item = null;
            
              if(is_string($item))
                $item = trim($item); //bỏ khoảng chống
             
              return $item;
            },
            $request->post());
            unset($params['cols']['_token']);
            // dd($params['cols']);
            if($request->hasFile('cmt_mat_truoc')&&$request->file('cmt_mat_truoc')->isValid()){
                $params['cols']['img'] = $this->uploadFile($request->file('cmt_mat_truoc'));
            };
            // $src =  $request->file('img')->store('public/images');//store lưu chữ các file ảnh
            // $src = str_replace('public/images/', "", $src);
            $modelTest = new products();
            $res = $modelTest->saveNew($params);
            if ($res == null) {
                # code...
                redirect()->route($method_route);
            }elseif($res> 0 ){
                Session::flash('success','Thêm sản phẩm thành công');
                return redirect() ->route($method_route_index);
            }else {
                Session::flash('arro','Lỗi thêm mới');
                redirect()->route($method_route) ;
            }
            // dd($params['cols']);
        }
        return view('admin.sanpham.add', $this->v);
    }

    public function detailSp($id, Request $request)
    {
        $this->v['title'] = " chi tiết sản phẩm";
        $dm = new categories();
        $this->v['dm'] = $dm->categories();
        $test = new products();
        $objitem  = $test ->loadOneSP($id);
        // dd($objitem);
        $this->v['objitem_sp'] = $objitem;
        return view('admin.sanpham.detail', $this->v);
    }
    public function updateSp($id,SanphamRequest $request){
        $method_route_detail = "route_BackEnd_Sanpham_detail";
        $method_router_index = "route_BackEnd_Sanpham_Index";
        $params = []; 
        $params['cols'] = array_map(function($item){
            if($item == '')
            $item = null;
            if(is_string($item))
            $item = trim($item);
            return $item;
        },$request->post());
        unset($params['cols']['_token']);
        if($request->hasFile('img')&&$request->file('img')->isValid()){
            $params['cols']['img'] = $this->uploadFile($request->file('img'));
        }

        $params['cols']['id'] = $id;
      
        $test = new products();
        $res = $test->SaveSp($params);
        if($res == null){
            return redirect()->route($method_route_detail,['id'=>$id]);
        }
        elseif($res == 1){
            Session::flash('success','cập nhật bản ghi '.$id.'thành công');
            return redirect()->route($method_router_index,['id'=>$id]);
        }
        else{
            Session::flash('success','lỗi cập nhật bản ghi '.$id);
            return redirect()->route($method_route_detail,['id'=>$id]);
        }
    }



    public function destroy($id)
    {
        $method_route_sp = 'route_BackEnd_Sanpham_Index';
        $model = new products();
        $res = $model->Xoa($id);

        if ($res == null) {
            # code...
            return  redirect()->route($method_route_sp);
        } elseif ($res > 0) {
            Session::flash('success', 'Xóa sản phẩm '.$id.'thành công');

            return   redirect()->route($method_route_sp);
        } else {
            Session::flash('erro', 'Xóa lỗi');
            redirect()->route($method_route_sp);
        }
        return redirect()->route($method_route_sp);
    }
    
    public function uploadFile($file){
        $fileName = time().'_'.$file->getClientOriginalName();  // 
        return $file->storeAs('anh_cmmd',$fileName,'public');
    }
}
