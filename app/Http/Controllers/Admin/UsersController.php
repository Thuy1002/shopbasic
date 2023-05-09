<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index(Request $request)
    {
       // $this->v['tieude'] = ['nguoi dung'];
        $object = new users();
        $this->v['extParams'] = $request->all();
        $this->v['list'] = $object->loadListWithPager();
        //dd($users);
        // $this->v['tests'] = $tests;
        return view('admin.nguoidung.index', $this->v);
    }
    //phương thức add
    public function add(UserRequest $request)
    {
        $this->v['_title'] = "them nguoi dung";
        $method_route = 'route_BackEnd_Uesr_Add';
        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = array_map(
                function ($item) {
                    if ($item == '')
                        $item = null;

                    if (is_string($item))
                        $item = trim($item); //bỏ khoảng chống

                    return $item;
                },
                $request->post()
            );
            unset($params['cols']['_token']);
            if($request->hasFile('cmt_mat_truoc')&&$request->file('cmt_mat_truoc')->isValid()){
                $params['cols']['img'] = $this->uploadFile($request->file('cmt_mat_truoc'));
            }

            $modelTest = new users();
            $res = $modelTest->saveNew($params);
            if ($res == null) {
                # code...
                redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'them moi thanh cong nguoi dung');
            } else {
                Session::flash('arro', 'loi them moi');
                redirect()->route($method_route);
            }
            // dd($params['cols']);
        }
        return view('admin.nguoidung.add', $this->v);
    }
    public function detailNd($id, Request $request)
    {
        $this->v['title'] = " chi tiết người dùng";
        $test = new users();
        $objitem  = $test ->loadOneNd($id);
        // dd($objitem);
        $this->v['objitem'] = $objitem;
        return view('admin.nguoidung.detail', $this->v);
    }

    
    public function updateNd($id,UserRequest $request){
        $method_route_detail = "route_BackEnd_Uesr_detail";
        $method_router_index = "route_BackEnd_Uesr_Index";
        $params = []; 
        $params['cols'] = array_map(function($item){
            if($item == '')
            $item = null;
            if(is_string($item))
            $item = trim($item);
            return $item;
        },$request->post());
        unset($params['cols']['_token']);
        // if($request->hasFile('img')&&$request->file('img')->isValid()){
        //     $params['cols']['img'] = $this->uploadFile($request->file('img'));
        // }
        $params['cols']['id'] = $id;
        $params['cols']['password']  = Hash::make($params['cols']['password']);
        $test = new users();
        $res = $test->SaveupdateNd($params);
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
        $user = User::find($id);
        return redirect()->back()->with('success', 'Xóa thành công!');
    }

    // public function uploadFile($file){
    //     $fileName = time().'_'.$file->getClientOriginalName();  // 
    //     return $file->storeAs('anh_cmmd',$fileName,'public');
    // }
}