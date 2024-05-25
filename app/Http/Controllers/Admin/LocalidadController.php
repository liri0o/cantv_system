<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Localidad;
use App\Models\Estado;
use App\Models\Region;
use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $localidades = Localidad::orderBy('id', 'asc')->with('estado.region')->paginate(10);
        return view('admin.localidades.index', compact('localidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.localidades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'estado_id' => 'required|exists:estados,id',
            'name' => 'required'
        ]);

        Localidad::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Localidad creada satisfactoriamente.'
        ]);

        return redirect()->route('admin.localidades.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Localidad $localidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Localidad $localidad)
    {        
        return view('admin.localidades.edit', compact('localidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Localidad $localidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Localidad $localidad)
    {
        //
    }
}
