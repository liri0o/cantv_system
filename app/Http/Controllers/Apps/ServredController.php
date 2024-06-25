<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Servred;
use Illuminate\Http\Request;

class ServredController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $redequipzCargados = Servred::paginate();
        return view('servreds', compact('redequipzCargados'));
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
    public function show(Servred $servred)
    {
        return view('servreds.show', compact('servred')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servred $servred)
    {
        //
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
        //
    }
}
