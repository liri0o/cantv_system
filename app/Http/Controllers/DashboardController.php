<?php

namespace App\Http\Controllers;

use App\Models\Circuito;
use App\Models\Cuarto;
use App\Models\Servred;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userz = User::count();
        

        $ultimosCuartos = Cuarto::orderBy('created_at', 'desc')
        ->take(7)->get();

        $ultimosCircuitos = Circuito::orderBy('created_at', 'desc')
        ->take(7)->get();

        $ultimosRedequips = Servred::orderBy('created_at', 'desc')
        ->take(7)->get();
       
        return view('dashboard', compact('ultimosCuartos', 'ultimosCircuitos', 'ultimosRedequips', 'userz'));
    }
}
