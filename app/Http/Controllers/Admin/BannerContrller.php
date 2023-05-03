<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class BannerContrller extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index(Request $request)
    {
        $this->v['tieude'] = ['Quản lý banner'];
        $banner = new Banner();
        $this->v['extParams'] = $request->all();
        $this->v['list_banner'] = $banner->listBanner();
        //dd($users);
        // $this->v['tests'] = $tests;
        return view('admin.banner.index', $this->v);
    }
    //phương thức add
    public function add(BannerRequest $request)
    {
        $this->v['_title'] = "thêm mới banner";
        $method_route = 'route_BackEnd_Banner_Add';
        $method_route_index = 'route_BackEnd_Banner_Index';
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
            if ($request->hasFile('cmt_mat_truoc') && $request->file('cmt_mat_truoc')->isValid()) {
                $params['cols']['img'] = $this->uploadFile($request->file('cmt_mat_truoc'));
            }

            $modelTest = new Banner();
            $res = $modelTest->saveBanner($params);
            if ($res == null) {
                # code...
                redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'them moi thanh cong banner');
                return redirect()->route($method_route_index);
            } else {
                Session::flash('arro', 'loi them moi');
                redirect()->route($method_route);
            }
            // dd($params['cols']);
        }
        return view('admin.banner.add', $this->v);
    }
    public function detailBaner($id, Request $request)
    {
        $this->v['_title'] = " Banner";
        $test = new Banner();
        $objitem  = $test->loadOneBanner($id);
        // dd($objitem);
        $this->v['objitem'] = $objitem;
        return view('admin.banner.detail', $this->v);
    }


    public function updatebanner($id, BannerRequest $request)
    {
        $method_route_detail = "route_BackEnd_Banner_detail";
        $method_router_index = "route_BackEnd_Banner_Index";
        $params = [];
        $params['cols'] = array_map(function ($item) {
            if ($item == '')
                $item = null;
            if (is_string($item))
                $item = trim($item);
            return $item;
        }, $request->post());
        unset($params['cols']['_token']);
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $params['cols']['img'] = $this->uploadFile($request->file('img'));
        }

        $params['cols']['id'] = $id;

        $test = new Banner();
        $res = $test->SaveupdateBanner($params);
        if ($res == null) {
            return redirect()->route($method_route_detail, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'cập nhật bản ghi ' . $id . 'thành công');
            return redirect()->route($method_router_index, ['id' => $id]);
        } else {
            Session::flash('success', 'lỗi cập nhật bản ghi ' . $id);
            return redirect()->route($method_route_detail, ['id' => $id]);
        }
    }
    // public function destroy($id)
    // {
    //     $method_router_index = "route_BackEnd_Banner_Index";
    //     $model = new Banner();
    //     $res = $model->Xoa($id);

    //     if ($res == null) {
    //         # code...
    //         return  redirect()->route($method_router_index);
    //     } elseif ($res > 0) {
    //         Session::flash('success', 'Xóa  '.$id.'thành công');

    //         return   redirect()->route($method_router_index);
    //     } else {
    //         Session::flash('erro', 'Xóa lỗi');
    //         redirect()->route($method_router_index);
    //     }
    //     return redirect()->route($method_router_index);
    // }
    public function destroy($id){
        $a = Banner::find($id);
        $a->delete();
        return redirect()->route('route_BackEnd_Banner_Index')
            ->with('success', 'xóa thành công');
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();  // 
        return $file->storeAs('anh_cmmd', $fileName, 'public');
    }
}
