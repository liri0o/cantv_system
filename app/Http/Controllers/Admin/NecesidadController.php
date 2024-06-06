<?php

namespace App\Http\Controllers\Admin;

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
        $necesidads = Necesidad::paginate();
        return view('admin.necesidads.index', compact('necesidads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.necesidads.create');
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
        return view('admin.necesidads.show', compact('necesidad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Necesidad $necesidad)
    {
        return view('admin.necesidads.edit', compact('necesidad'));
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
        $necesidad->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Necesidad eliminada correctamente.'
        ]);
        
        return redirect()->route('admin.necesidads.index');
    }
}
