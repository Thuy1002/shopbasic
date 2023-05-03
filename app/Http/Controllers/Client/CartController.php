<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    
     public function cartList()
    {
        if (auth()->user()) {
            $carts = auth()->user()->load('cart')->cart;
            $carts_total = auth()->user()->load('carts')->carts;
        } else {
            $carts = [];
        }
        $banner = Banner::all();
        // dd($carts);
        return view('client.cart', compact('carts','carts_total','banner'));
    }

    //dựa vào mối quan hệ giữa các bảng 
    public function addToCart(Request $request, products $product)
    {
        $carts = auth()->user()->load('carts')->carts;
    
        if ($carts->contains('id', $product->id)) {
            return redirect()->back()->with('failed', 'Sản phẩm đã tồn tại trong giỏ hàng.');
        }
    
        auth()->user()->load(['carts'])->carts()->attach(['products_id' => $product->id]);
    
        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng.');
    }

    /* query builder */ 
//     public function addToCart(Request $request, products $product)
// {
//     // Lấy ID của sản phẩm và ID của người dùng hiện tại
//     $productId = $product->id;
//     $userId = auth()->user()->id;

//     // Tìm kiếm bản ghi trong bảng trung gian 'cart_user' với productId và userId tương ứng
//     $existingCart = DB::table('cart')->where('products_id', $productId)->where('user_id', $userId)->first();

//     // Nếu sản phẩm đã có trong giỏ hàng thì trả về một thông báo lỗi
//     if ($existingCart) {
//         return redirect()->back()->with('failed', 'Sản phẩm đã tồn tại trong giỏ hàng.');
//     }

//     // Nếu chưa có thì thêm sản phẩm mới vào giỏ hàng của người dùng hiện tại
//     // Bằng cách tạo một bản ghi mới trong bảng trung gian giữa bảng users và products
//     DB::table('cart')->insert([
//         'user_id' => $userId,
//         'products_id' => $productId,
//         'created_at' => now(),
//         'updated_at' => now(),
//     ]);

//     // Chuyển hướng trở lại trang trước đó với thông báo thành công
//     return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng.');
// }

    public  function destroy($id)
    {    
        Cart::destroy($id);
        return redirect()->back()->with('success', 'Xóa thành công');
    }
     public function checkout()
    {
        $banner = Banner::all();
        $carts = auth()->user()->load('carts')->carts;
        return view('client.checkout',compact('banner'));
    }
}
