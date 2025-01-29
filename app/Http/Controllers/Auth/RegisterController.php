<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
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
            'correo' => ['required', 'email', 'unique:usuario,correo'],
            'clave' => ['required', 'string', 'min:6', 'confirmed'],
            'rol' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Usuario
     */
    protected function create(array $data)
    {
        $currentTimestamp = now();

        return Usuario::create([
            'correo' => $data['correo'],
            'clave' => Hash::make($data['clave']),
            'rol' => $data['rol'],
            'fecha_actualizacion' => $currentTimestamp,
            'fecha_creacion' => $currentTimestamp,
        ]);
    }
}
