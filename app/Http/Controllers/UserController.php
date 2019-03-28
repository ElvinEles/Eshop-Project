<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
use App\Users;

class UserController extends Controller
{
    public function login()
    {
      $categories_index=Category::all();

       return view('include/login')->with("categories_index",$categories_index);
    }

    public function register()
    {
      $categories_index=Category::all();

       return view('include/register')->with("categories_index",$categories_index);
    }

    public function register_save(Request $request)
    {
      $validator = Validator::make($request->all(), [
            'user_email' => 'email',
            'user_password' => 'min:7'
        ]);

      $errors=$validator->errors();

        if ($errors->first('user_email')) {
          session()->put('user_error','Email düzgün deyil');
          return redirect('/register');
        }else if ($errors->first('user_password')) {
          session()->put('user_error','Parol minimum 7 xarakter olmalıdır');
          return redirect('/register');
        }

        $user=new Users();
        $user->user_name=ucwords($request->user_name);
        $user->user_email=ucwords($request->user_email);
        $user->user_password=md5($request->user_password);

        $result=$user->save();

        if ($result) {
          session()->put('user_error','User qeyd olundu');
          return redirect('/register');
        }else{
          session()->put('user_error','User qeyd oluna bilmədi');
          return redirect('/register');
        }

    }


    public function login_checkout(Request $request)
    {
      $validator = Validator::make($request->all(), [
            'user_email' => 'email',
            'user_password' => 'min:7'
        ]);

      $errors=$validator->errors();

        if ($errors->first('user_email')) {
          session()->put('user_error','Email düzgün deyil');
          return redirect('/login');
        }else if ($errors->first('user_password')) {
          session()->put('user_error','Parol minimum 7 xarakter olmalıdır');
          return redirect('/login');
        }

       $user=Users::where('user_email','=',$request->user_email)->first();
       $user_password_input=md5($request->user_password);
       if ($user_password_input == $user->user_password) {
          session()->put('user_email',$user->user_email);
          session()->put('user_name',$user->user_name);
          session()->put('user_id',$user->user_id);
           return redirect('/');
       }else{
         session()->put('user_error','Parol yanlışdır');
         return redirect('/login');
       }

    }


    public function mykabinet($id)
    {
     $current_user=Users::where('user_id','=',$id)->first();
     $categories_index=Category::all();

      return view('include/mykabinet')->with("categories_index",$categories_index)
                                      ->with('current_user',$current_user);
    }

    public function logout()
    {
      session()->forget('user_name');
      session()->forget('user_id');

    return redirect('/');
    }


}
