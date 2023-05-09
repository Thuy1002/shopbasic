<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $banner = Banner::all();
        $user = User::find($id);
        return view('client.account', compact('banner', 'user'));
    }

    public function changeIf($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->number_phone = $request->input('number_phone');
        $user->address = $request->input('address');
        $user->save();
        return redirect()->back()->with('success', "Thay đổi thành công");
    }

    public function changePass($id, Request $request)
    {
        $user = User::find($id);
        if (Hash::check($request->input('password'), $user->password)) 
        {
            if($request->pass2 == $request->pass3)
            {
                $user->password = Hash::make($request->input('pass3'));
                $user->save();
                return redirect()->back()->with('success',"Thay đổi thành công");
            }
            else{
                return redirect()->back()->with('error',"Mật khẩu mới không giống nhau"); 
            }
        }
        else{
           return redirect()->back()->with('error',"Vui lòng nhập lại mật khẩu");
        }
        
    }
}
