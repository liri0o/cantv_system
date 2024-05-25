<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuarto;
use App\Models\Statu;
use Illuminate\Http\Request;

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
        //
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
