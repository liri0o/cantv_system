<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Circuito;
use App\Models\Cuarto;
use App\Models\Necesidad;
use App\Models\Servred;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CuartoController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuartos = Cuarto::paginate();
        return view('admin.cuartos.index', compact('cuartos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cuartos.create');
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
        $circuitos = Circuito::where('cuarto_id', '=', $cuarto->id)->get();
        $servreds = Servred::where('cuarto_id', '=', $cuarto->id)->get();
        $necesidads = Necesidad::where('cuarto_id', '=', $cuarto->id)->get();
        return view('admin.cuartos.show', compact('cuarto', 'circuitos', 'servreds', 'necesidads'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuarto $cuarto)
    {

        return view('admin.cuartos.edit', compact('cuarto'));
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
        if (count($cuarto->circuitos) > 0 || isset($cuarto->necesidads) || count($cuarto->servreds) > 0) 
        {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Oh no!',
                'text' => 'El cuarto no puede ser eliminado porque tiene uno o varios elementos asignados.'
            ]);
            return redirect()->route('admin.cuartos.edit', $cuarto);
        }
        /*  if( isset($cuarto->necesidads)){
                session()->flash('swal' , [
                    'icon' => 'error',
                    'title' => '¡Oh no!',
                    'text' => 'El cuarto no puede ser eliminado porque tiene necesidades asignados.'
                ]);
                return redirect()->route('admin.cuartos.edit', $cuarto);
            } 
            if($cuarto->servreds->count() > 0){
                session()->flash('swal' , [
                    'icon' => 'error',
                    'title' => '¡Oh no!',
                    'text' => 'El cuarto no puede ser eliminado porque tiene equipos de red asignados.'
                ]);
                return redirect()->route('admin.cuartos.edit', $cuarto);
            }  
        */
        

        Storage::delete($cuarto->photo_1);
        Storage::delete($cuarto->photo_2);

        $cuarto->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Cuarto eliminado correctamente.'
        ]);

        return redirect()->route('admin.cuartos.index');
    }
}
