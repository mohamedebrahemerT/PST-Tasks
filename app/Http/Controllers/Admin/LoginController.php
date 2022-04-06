<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    

    public function login(){
        $remeber=Request('Remember')==1? true:false ;
         
        if(auth::guard('web')->attempt( ['email'=>Request('email'),'password'=>Request('password') ],$remeber) ){ 
            //Check if active user or not 
            if(Auth::user()->status != 'available')
            {
                Auth::logout();
                session()->flash('danger', trans('admin.not_auth')); 
                return redirect('login');
            }
            else
            {
                 session()->put('lang','ar');
                    return redirect('/home');

            }
        }else{
            session()->flash('danger',trans('admin.invaldemailorpassword'));
          return redirect('login');
         }

     
    }
}
