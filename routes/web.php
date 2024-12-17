<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Importaciones de tus controladores
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\NotaVentaController;


Auth::routes();


use App\Categoria;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\MarcaController;
use App\Marca;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


Auth::routes();


Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Muestra el formulario de inicio de sesión
Route::post('/login', [AuthController::class, 'login']); // Maneja la autenticación
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Maneja el cierre de sesión

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    //Roles
        Route::middleware(['role:administrador'])->group(function () {
            Route::get('/admin', function () {
                return 'Bienvenido, Administrador Don';
            });
        });

        Route::middleware(['role:cliente'])->group(function () {
            Route::get('/cliente', function () {
                return 'Bienvenido, Cliente';
            });
        });

        Route::middleware(['role:cliente-canal,vendedor'])->group(function () {
            Route::get('/canal', function () {
                return 'Bienvenido al canal de ventas.';
            });
        });


        //rutas protegidas por permisos
        Route::middleware(['permission:manage-users'])->group(function () {
            Route::get('/gestion/usuarios', function () {
                return 'Gestión de Usuarios';
            });
        });
        Route::middleware(['permission:manage-sales'])->group(function () {
            Route::get('/gestion/ventas', function () {
                return 'Gestión de Ventas';
            });
        });
<<<<<<< HEAD
        
=======

>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4
        Route::middleware(['permission:manage-payments'])->group(function () {
            Route::get('/gestion/pagos', function () {
                return 'Gestión de Pagos';
            });
        });

});


Route::resource('usuarios', UsuarioController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('vendedores', VendedorController::class);
<<<<<<< HEAD
//Route::resource('notas_venta', NotaVentaController::class);
Route::resource('marcas', MarcaController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('licencias', LicenciaController::class);
=======
Route::resource('notas_venta', NotaVentaController::class);
Route::resource('marcas', MarcaController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('licencias', LicenciaController::class);
Route::resource('notaventa', NotaVentaController::class);
Route::resource('series', SerieController::class);

>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

<<<<<<< HEAD

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/series/buscar', [SerieController::class, 'buscarPorLicencia'])->name('series.buscarPorLicencia');
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4
