<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmMail;
use Illuminate\Http\Request;
use App\User;
use App\ConfirmUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;


class AdvancedReg extends Controller
{
    public function register(Request $request)

    {

        $this->validate($request, [

            'name' => 'required|unique:users|max:100',

            'email' => 'required|unique:users|max:250|unique:users|email',

            'password' => 'required|confirmed|min:6',

        ]);

        $user=User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        if(!empty($user->id))
        {
            $email=$user->email;
            $token=str_random(32);
            $model=new ConfirmUsers;
            $model->email=$email;
            $model->token=$token;
            $model->save();
            $url = route('register.confirm', array($token));

            Mail::to($email)->send(new ConfirmMail($url));
            return Redirect::back()->with('message','На указаную почту пришло письмо с cсылкой подтверждениея регистрации. Для продолжения проверьте почту и перейдите по предложеной ссылке');
        }
        else
        {
            return Redirect::back()->with('message', 'Ошибка, попробуйте позже');
        }

    }
    public function confirm($token)
    {
        $model=ConfirmUsers::where('token','=',$token)->firstOrFail();
        $user=User::where('email','=',$model->email)->first();
        $user->status=1;
        $user->save();
        if($user->status==1){
            Auth::login($user);
        }

        $model->delete();
        return redirect('/');
    }

}
