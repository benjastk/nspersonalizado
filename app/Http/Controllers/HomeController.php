<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Rutina;
use App\Ejercicio;
use App\FormularioContacto;
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
    public function index()
    {
        $user = Auth::user();
        $rutinas = Rutina::count();
        $ejercicios = Ejercicio::count();
        $leads = FormularioContacto::count(); 
        return view('backend.home', compact('user', 'rutinas', 'ejercicios', 'leads'));
    }
    public function leads()
    {
        $user = Auth::user();
        $leads = FormularioContacto::get(); 
        return view('backend.leads', compact('user','leads'));
    }
    public function inicio()
    {
        $user = Auth::user();
        return view('backend.alumnos.home', compact('user'));
    }
}
