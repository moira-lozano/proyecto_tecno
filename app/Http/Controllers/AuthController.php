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
        // Validar las credenciales
        $credentials = $request->validate([
            'correo' => ['required', 'email'],
            'clave' => ['required'],
        ]);

        dd([
            'input' => $request->all(),
            'user_exists' => Usuario::where('correo', $request->correo)->exists(),
            'password_hash' => Usuario::where('correo', $request->correo)->first()?->clave ?? null,
            'password_check' => Hash::check($request->clave, Usuario::where('correo', $request->correo)->first()?->clave ?? ''),
        ]);
        

        $user = Usuario::where('correo', $credentials['correo'])->first();

        if ($user && Hash::check($credentials['clave'], $user->clave)) {
            Auth::login($user); // Se autentica con el ID, no con el correo
            return redirect()->intended($this->redirectTo);
        }
        
        

        // Si falla, regresar con un mensaje de error
        return back()->withErrors([
            'correo' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('correo');
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
