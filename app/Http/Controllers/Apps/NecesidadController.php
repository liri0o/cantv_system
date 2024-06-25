<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Necesidad;
use Illuminate\Http\Request;

class NecesidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $necesidadzCargadas = Necesidad::paginate();
        return view('necesidads', compact('necesidadzCargadas'));
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
    public function show(Necesidad $necesidad)
    {
        return view('necesidads.show', compact('necesidad')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Necesidad $necesidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Necesidad $necesidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Necesidad $necesidad)
    {
        //
    }
}
