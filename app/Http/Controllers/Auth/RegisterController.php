<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterUserAJAXRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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
            'name' => 'required|alpha|max:255',
            'lastName' => 'required|alpha|max:255',
            'username' => 'required|alpha_dash|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        $und = 'Undefined';

        return User::create([
            'name' => ucwords(strtolower($data['name'])),
            'last_name' => ucwords(strtolower($data['lastName'])),
            'username' => $data['username'],
            'avatar' => "http://www.underconsideration.com/wordit/wordit_archives/0401_empty_James_Ketsdever_2.jpg",
            'email' => $data['email'],
            'phone' => $und,
            'website' => $und,
            'about' => $und,
            'password' => bcrypt($data['password']),
        ]);
    }


    /*Validacion por Ajax con FormRquest*/
    protected function validateAJAX(RegisterUserAJAXRequest $request){
        //Obtenermos todos los valores y devolvemos un array vacio
        return array();
    }
}
