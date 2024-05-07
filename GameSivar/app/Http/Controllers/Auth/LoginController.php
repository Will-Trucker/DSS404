<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    

         // Otros métodos y propiedades...
     
         /**
          * The user has been authenticated.
          *
          * @param  \Illuminate\Http\Request  $request
          * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
          * @return mixed
          */
          
         protected function authenticated(Request $request, $user)
         {
             if ($user->email === 'admin@gmail.com') {
                 return redirect('/admin');
             }
     
             // Dejar que la aplicación proceda con la redirección predeterminada
             return redirect()->intended($this->redirectPath());
         }

     
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
