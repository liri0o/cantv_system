<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::paginate();        
        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      
       
        $user = User::create($request->only( 'name','email')
        +['password' => bcrypt($request->input('password'))
        ]);

    /* $roles = $request->input('roles', []); */
    $user->roles()->sync($request->roles);

    session()->flash('swal', [
        'icon' => 'success',
        'title' => '¡¡Listo!!',
        'text' => 'Usuario creado satisfactoriamente.'
    ]);

    return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('admin.usuarios.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {       
        $roles = $request->input('roles', []);
        $user->roles()->sync($request->roles);
        $user->update($request->only('name', 'email'));
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Usuario modificado correctamente.'
        ]);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Usuario eliminado correctamente.'
        ]);
        
        return redirect()->route('admin.users.index');
    }
}
