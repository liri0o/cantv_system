<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Circuito;
use Illuminate\Http\Request;

class CircuitoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $circuitozCargados = Circuito::paginate();
       return view('circuitos', compact('circuitozCargados'));
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
    public function show(Circuito $circuito)
    {
        return view('circuitos.show', compact('circuito'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Circuito $circuito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Circuito $circuito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Circuito $circuito)
    {
        //
    }
}
