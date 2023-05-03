<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use App\Models\danhmuc;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index()
    {
        // Mail::to("thuy1002dangthanh@gmail.com")->send(new OrderShipped(['ma'=>'1232311']));
      
        $dm = new categories();
        $this->v['dm'] = $dm->categories();
       return view('client.checkout',$this->v);

    }
}
