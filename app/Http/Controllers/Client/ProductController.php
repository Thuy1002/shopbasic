<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use App\Mail\OrderShipped;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\categories;
use App\Models\Discount;
use App\Models\Home;
use App\Models\products;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->v = [];
    }
    public function home()
    {
        // Mail::to("thuy1002dangthanh@gmail.com")->send(new OrderShipped(['ma'=>'1232311']));
        $discount = DB::table('discount')->inRandomOrder()->first();
        $product = products::inRandomOrder()->first();
        if ($discount->discount < $product->price && $discount->end_time < now()) {

            $discountPrice = $product->price - $discount->discount;
        } else {
            $discountPrice = $product->price;
        }
        $product->discount_price = $discountPrice;
        $product->save();

        $ct_sp = new users();
        $dm = new categories();
        $this->v['dm'] = $dm->categories();
        $obj = new Home();
        $banner  = new Banner();
        $this->v['banner'] = $banner->LBanner();
        $this->v['Listsp'] = $obj->Listsp();
        $discount = Discount::inRandomOrder()->first();

        return view('client.trangchu', $this->v, compact('discount', 'product'));
    }
    public function store(Request $request)
    {
        $discount = DB::table('discount')->inRandomOrder()->first();
        $product = products::inRandomOrder()->first();
        if ($discount->discount < $product->price) {

            $discountPrice = $product->price - $discount->discount;
        } else {
            $discountPrice = $product->price;
        }
        $product->discount_price = $discountPrice;
        $product->save();

        $dm = new categories();
        $this->v['dm'] = $dm->categories();
        $banner  = new Banner();
        $this->v['banner'] = $banner->LBanner();
        $obj = new Home();
        $this->v['extParams'] = $request->all();
        $this->v['Listsp'] = $obj->Listsp();
        return view('client.sanpham', $this->v, compact('product'));
    }
    public function detail($id, Request $request)
    {

        $product = products::findOrFail($id);
        $comments = $product->comment()->with('user')->get();
        $dm = new categories();
        $this->v['dm'] = $dm->categories();
        $banner  = new Banner();
        $this->v['banner'] = $banner->LBanner();
        $test = new Home();
        $objitem  = $test->loadOne($id);
        // dd($objitem);
        $this->v['objitem'] = $objitem;
        return view('client.ct_sp', $this->v,compact('comments'));
    }
    public function product_dm($id, Request $request)
    {
        $dm = new categories();
        $this->v['dm'] = $dm->categories();
        $banner  = new Banner();
        $this->v['banner'] = $banner->LBanner();
        $sp = new Home();
        $this->v['extParams'] = $request->all();
        $this->v['id_dm'] = $sp->loadwithDm($id);
        return view('client.dmsp', $this->v);
    }
    public  function search(Request $request)
    {
        # code...
        $banner = new Banner();
        $this->v['banner'] = $banner->LBanner();
        $search  = products::where('title', 'like', '%' . $request->key . '%')
            ->where('status', '!=', 2)
            ->get();
        return view('client.search', compact('search'), $this->v);
        // dd($search);

    }
    public function min(Request $request)
    {
        $products = products::orderBy('price', 'asc')
            ->where('status', '!=', 2)
            ->paginate(6);
        $dm = new categories();
        $this->v['dm'] = $dm->categories();
        $banner  = new Banner();
        $this->v['banner'] = $banner->LBanner();
        $obj = new Home();
        $this->v['extParams'] = $request->all();
        return view('client.asc', $this->v, compact('products'));
    }
    public function max(Request $request)
    {
        $products = products::orderBy('price', 'desc')
            ->where('status', '!=', 2)
            ->paginate(6);
        $dm = new categories();
        $this->v['dm'] = $dm->categories();
        $banner  = new Banner();
        $this->v['banner'] = $banner->LBanner();
        $obj = new Home();
        $this->v['extParams'] = $request->all();
        return view('client.desc', $this->v, compact('products'));
    }
}
