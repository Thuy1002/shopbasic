<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Models\User;
// use App\Models\users;
use Illuminate\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getLogin()
    {
        // Mail::to("thuy1002dangthanh@gmail.com")->send(new OrderShipped(['ma'=>'1232311']));
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        //  dd($request -> all())
        $rules = [  //kiểm tra dữ liệu đầu vào
            'email' => 'required | email',
            'password' => 'required'
        ];
        $messages = [
            'email.required' => 'Chưa nhập Email',
            'email.email' => 'Vui lòng nhập đúng Email',
            'password.required' => 'Chưa nhập password'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        // dd($validator);
        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            $email  = $request->input('email'); //đón dữ liệu từ bên trang login gửi sang

            $password = $request->input('password');
            //Auth::attempt(): Đây là phương thức check input data có hợp lệ không,
            // nếu hợp lệ sẽ trả về true và ngược lại. 
            if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'admin'])) {
                return redirect()->route('route_BackEnd_Uesr_Index');
            }
            if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'user'])) {
                return redirect('/');
            } else {
                Session::flash('error', 'Email hoặc mật khẩu không đúng');
                return redirect('login')->withErrors($validator)->withInput();
            }
        }
    }


    public function getlogout()
    {
        Auth::logout();
        return redirect('login');
    }


    public function getSignup()
    {
        return view('auth.signup');
    }
    public function postSignup(Request $request)
    {
        // if ($request->isMethod('post')) {
        //     $validator = Validator::make($request->all(), [
        //         'name' => 'required',
        //         'email' => 'required|email',
        //         'password' => 'required',
        //     ]);
        $rules = [  //kiểm tra dữ liệu đầu vào
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required'
        ];
        $messages = [
            'name.required' => 'Chưa nhập họ tên',
            'email.required' => 'Chưa nhập Email',
            'email.email' => 'Vui lòng nhập đúng Email',
            'password.required' => 'Chưa nhập password'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
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
        $model = new User();
        $res = $model->taoTK($params);
        if ($res > 0) {
            Session::flash('success', 'Đăng ký thành công');
            return redirect('login');
        }
    }
}
