<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Traits\AuthTrait;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    use AuthTrait;
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function formLogin($type)
    {
       // dd(5);
        return view('auth.login',compact('type'));
    }
    public function login(Request $request){

        if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->redirect($request);
         }
         else{
             return redirect()->back()->with('message', 'يوجد خطا في كلمة المرور او اسم المستخدم');
         }

    }
    public function logout(Request $request,$type){
       // dd(5);
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
/*

  if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
           return $this->redirect($request);
        }
        else{
            return redirect()->back()->with('message', 'يوجد خطا في كلمة المرور او اسم المستخدم');
        }
*/
