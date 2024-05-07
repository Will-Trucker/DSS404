<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
 
     protected function validator(array $data)
     {
         return Validator::make($data, [
             'name' => ['required', 'string', 'max:255'],
             'lastname' => ['required', 'string', 'max:255'],
             'phone' => ['required', 'string', 'regex:/^[0-9]{8}$/'], // Número de teléfono de 8 dígitos
             'birth' => ['required', 'date', 'before_or_equal:' . \Carbon\Carbon::now()->subYears(18)->format('Y-m-d')], // Mayor de 18 años
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^(.+)@(outlook\.com|gmail\.com|hotmail\.com|icloud\.com)$/i'], // Correo único
             'password' => ['required', 'string', 'min:2', 'confirmed'], // Contraseña de al menos 8 caracteres
         ]);
     }
     
    
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'birth' => $data['birth'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    
}
