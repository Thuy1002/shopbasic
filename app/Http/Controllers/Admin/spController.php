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
    public function index(Request $request)
    {
        $this->v['extParams'] = $request->all();
        $products = products::join('categories', 'products.categories_id', '=', 'categories.id')
            ->select('products.*', 'categories.title as category_name')
             // Đồng thời, đặt tên mới cho cột title của bảng categories thành category_name, 
             //để có thể truy cập thông tin danh mục của sản phẩm thông qua thuộc tính category_name
             // của đối tượng sản phẩm.
            ->paginate(5);
        return view('admin.sanpham.index', $this->v, compact('products'));
    }


    public function add(SanphamRequest $request)
    {
        $this->v['_title'] = "Thêm sản phẩm";
        $dm = new categories();
        $this->v['tieude'] = "thêm sản phẩm";
        $this->v['dm'] = $dm->categories();
        return view('admin.sanpham.add', $this->v);
    }
    public function store(SanphamRequest $request)
    {
        $product = new products();
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->describe = $request->input('describe');
        $product->categories_id = $request->input('categories_id');
        $product->quantity = $request->input('quantity');
        $product->status = $request->input('status');
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/images', $fileName);
            $product->img = $fileName;
        }
        $product->save();
       // dd($product);
        return redirect()->route('route_BackEnd_Sanpham_Index')->with('success',"Thêm sản phẩm thành công");
    }

    public function detailSp($id, Request $request)
    {
        $this->v['title'] = " chi tiết sản phẩm";
        $dm = new categories();
        $this->v['dm'] = $dm->categories();
        $test = new products();
        $objitem  = $test->loadOneSP($id);
        // dd($objitem);
        $this->v['objitem_sp'] = $objitem;
        return view('admin.sanpham.detail', $this->v);
    }
    public function updateSp($id, SanphamRequest $request)
    {
        $method_route_detail = "route_BackEnd_Sanpham_detail";
        $method_router_index = "route_BackEnd_Sanpham_Index";
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

        $test = new products();
        $res = $test->SaveSp($params);
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



    public function destroy($id)
    {
        $model = products::find($id);
        $model->delete();
        return redirect()->back()->with('success', 'Xóa thành công!');
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();  // 
        return $file->storeAs('anh_cmmd', $fileName, 'public');
    }
}
