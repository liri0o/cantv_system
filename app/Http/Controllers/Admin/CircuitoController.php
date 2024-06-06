<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Circuito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CircuitoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $circuitos = Circuito::paginate();
        return view('admin.circuitos.index', compact('circuitos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.circuitos.create');
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
        return view('admin.circuitos.show', compact('circuito'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Circuito $circuito)
    {
        return view('admin.circuitos.edit', compact('circuito'));
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

         Storage::delete($circuito->image_path);

        $circuito->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Circuito eliminado correctamente.'
        ]);
        
        return redirect()->route('admin.circuitos.index');

    }
}
