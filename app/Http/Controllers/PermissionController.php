<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::paginate(5);

        return view('admin.permissions.index', compact('permissions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Permission::create($request->only('name'));
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Hecho!!',
            'text' => 'Permiso creado satisfactoriamente.'
        ]);
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([            
            'name' => 'required'
        ]);
        $permission->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Permiso modificado correctamente.'
        ]);

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Permiso eliminado correctamente.'
        ]);
        
        return redirect()->route('admin.permissions.index');

    }
}
