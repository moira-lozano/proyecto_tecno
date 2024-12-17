<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
<<<<<<< HEAD
    // En HomeController
    public function index()
    {
        $rol = auth()->user()->rol;
        return view('home', compact('rol'));
=======
    public function index()
    {
        return view('home');
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4
    }
}
