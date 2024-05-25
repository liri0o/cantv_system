<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\Region;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::orderBy('id', 'asc')
            ->with('region')
            ->paginate(10);
        return view('admin.estados.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        return view('admin.estados.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'region_id' => 'required|exists:regions,id',
            'name' => 'required'
        ]);

        Estado::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Estado creado satisfactoriamente.'
        ]);
        return redirect()->route('admin.estados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        $regions = Region::all();
        return view('admin.estados.edit', compact('estado', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
        $request->validate([
            'region_id' => 'required|exists:regions,id',
            'name' => 'required'
        ]);
        $estado->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Estado modificado correctamente.'
        ]);

        return redirect()->route('admin.estados.index', $estado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        if ($estado->localidades->count() > 0) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Oh no!',
                'text' => 'La region no puede ser eliminada porque tiene localilades asignadas.'
            ]);
            return redirect()->route('admin.estados.edit', $estado);
        }

        $estado->delete();
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Listo!',
            'text' => 'El estado ha diso eliminado correctamente.'
        ]);

        return redirect()->route('admin.estados.index');
    }
}
