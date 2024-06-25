<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Servred;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ServredController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()    
    {       

        $servreds = Servred::paginate();
        return view('admin.servreds.index', compact('servreds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.servreds.create');
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
    public function show(Servred $servred)
    {
        return view('admin.servreds.show', compact('servred'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servred $servred)
    {
        return view('admin.servreds.edit', compact('servred'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servred $servred)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servred $servred)
    {

        Storage::delete($servred->image_path);

        $servred->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Circuito eliminado correctamente.'
        ]);
        
        return redirect()->route('admin.servreds.index');
        

    }
}