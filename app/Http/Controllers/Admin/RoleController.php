<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(5);

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all()->pluck('name', 'id');        
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
      $role = Role::create($request->only('name'));

      $role->permissions()->sync($request->input('permissions', []));

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Hecho!!',
            'text' => 'Rol creado satisfactoriamente.'
        ]);
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all()->pluck('name', 'id');
        $role->load('permissions');
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([            
            'name' => 'required'
        ]);
        $role->update($request->all());

        $role->permissions()->sync($request->input('permissions', []));

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Rol modificado correctamente.'
        ]);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Rol eliminado correctamente.'
        ]);
        
        return redirect()->route('admin.roles.index');
    }
}
