<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Circuito;
use App\Models\Cuarto;
use App\Models\Necesidad;
use App\Models\Servred;
use Illuminate\Http\Request;

class CuartoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuartozCargados = Cuarto::paginate();
        return view('cuartos', compact('cuartozCargados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuarto $cuarto)
    {
        $circuitoz = Circuito::where('cuarto_id', '=', $cuarto->id)->get();
        $servredz = Servred::where('cuarto_id', '=', $cuarto->id)->get();
        $necesidadz = Necesidad::where('cuarto_id', '=', $cuarto->id)->get();
        return view('cuartos.show', compact('cuarto','circuitoz','servredz', 'necesidadz'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuarto $cuarto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuarto $cuarto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuarto $cuarto)
    {
        //
    }
}
