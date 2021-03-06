<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:users',//nullable=permite valore nulos, unique que el valor sea unico en la tabla usuario
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|numeric|min:7',
            'address' => 'required|string|max:255',
            'username' => 'required|string|min:6|max:255|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'] ?: '', //?: para evitar conflictos
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'username' => $data['username']
        ]);
    }

    //sobreescribir metodo de RegisterUsers
    public function showRegistrationForm( Request $request )
    {
        $name = $request -> input('name');
        $email = $request -> input('email');
        return view('auth.register') -> with( compact('name','email') );
    }

}
