<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //新規登録画面
    public function getSignup()
    {
        return view('user.signup');
    }

    public function postSignup(Request $request)
    {
        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]
        );
        $user->save();

        return view('user.signup');
    }


    public function getSignin(Request $request)
    {
        $param = ['message' => 'ログインしてください。'];
        return view('user.signin', $param);
    }

    public function postSignin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/select');
        } else {
            $msg = 'ログインに失敗しました。';
        }

        return view('user.signin', ['message' => $msg]);
    }
}
