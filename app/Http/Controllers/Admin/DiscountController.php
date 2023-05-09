<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Discount;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount = Discount::paginate(4);
        return view('admin.discount.index', compact('discount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Discount::create($request->all());

        return redirect()->route('admin_discount')
            ->with('success', 'Thêm mới thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount = Discount::find($id);
        return view('admin.discount.update', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'code' => 'required',
            'discount' => 'required',
            'expiration_date' => 'required',
        ]);
        $discount = Discount::find($id);
        $discount->update($request->all());
        return redirect()->route('admin_discount')
            ->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = Discount::find($id);
        $discount->delete();
        return redirect()->back()
            ->with('success', 'Xóa thành công ');
    }
    public function checkDiscount(Request $request)
    {

        $couponCode = $request->input('code');
        $discountAmount = 0; // Khởi tạo giá trị giảm giá là 0
        $carts_total = Cart::all();

        $coupon = Discount::where('code', $couponCode)->first(); // Tìm kiếm mã giảm giá trong CSDL

        if ($coupon) { // Nếu tìm thấy mã giảm giá
            $discountAmount = $coupon->discount; // Lấy giá trị giảm giá từ CSDL
        }

        $totalPrice = $carts_total->sum('price'); // Lấy tổng giá trị các sản phẩm trong giỏ hàng
        $finalPrice = $totalPrice - $discountAmount; // Tính giá trị cuối cùng sau khi đã trừ đi giảm giá (nếu có)

        return response()->json([
            'discountAmount' => number_format($discountAmount) . ' VNĐ',
            'finalPrice' => number_format($finalPrice) . ' VNĐ',
        ]);
    }
}
