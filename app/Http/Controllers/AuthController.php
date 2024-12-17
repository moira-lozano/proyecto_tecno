<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario; 
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    use AuthenticatesUsers;


     /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
          // Contar visitas de la página actual
        //   Pagina::contarPagina(request()->path());

       
           // Obtener el número de visitas para la página actual
        //   $pagina = Pagina::where('path', request()->path())->first();
        //   $visitas = $pagina ? $pagina->visitas : 0;
        // return view('auth.login',compact('visitas'));
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validación
        $credentials = $request->only('correo', 'clave');
        
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('/');
        // }
       
         // Intenta autenticar con las credenciales proporcionadas
    if (Auth::attempt(['correo' => $credentials['correo'], 'password' => $credentials['clave']])) {
        // Inicio de sesión exitoso
        return redirect()->intended('/home');
    }

    // Si falla, depura las credenciales y los valores enviados
    dd([
        'input' => $credentials,
        'user_exists' => Usuario::where('correo', $credentials['correo'])->exists(),
        'password_hash' => Usuario::where('correo', $credentials['correo'])->first()?->clave ?? null,
        'password_check' => Hash::check($credentials['clave'], Usuario::where('correo', $credentials['correo'])->first()?->clave ?? ''),
    ]);

        return redirect()->back()->withErrors(['correo' => 'Las credenciales no coinciden con nuestros registros.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }


     /**
     * Customize the field for login.
     *
     * @return string
     */
    public function username()
    {
        return 'correo'; // Usar el campo correo para autenticación
    }

}
