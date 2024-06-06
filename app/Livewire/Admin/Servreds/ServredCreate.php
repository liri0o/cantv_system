<?php

namespace App\Livewire\Admin\Servreds;

use Livewire\Component;
use App\Models\Estado;
use App\Models\Localidad;
use App\Models\Cuarto;
use App\Models\Servred;
use Livewire\Attributes\Computed;
use Livewire\WithFileUploads;

class ServredCreate extends Component
{
    use WithFileUploads;
    public $estados;
    public $estado_id = '';
    public $localidad_id = '';

    public $image_path;

    public $servred = [
        'equip_type' => '',
        'equip_marca' => '',
        'equip_modelo' => '',
        'equip_serial' => '',
        'code_inv' => '',
        'cant_puertos_dis' => '',
        'cant_ports_oc' => '',
        'cant_ports_total' => '',
        'description' => '',
        'image_path' => '',
        'cuarto_id' => ''
    ];

    public function mount()
    {

        $this->estados = Estado::all();
    }

    public function boot()
    {

        $this->withValidator(function ($validator) {

            if ($validator->fails()) {

                $this->dispatch('swal', [
                    'icon' => 'error',
                    'title' => '¡Error fatal!',
                    'text' => 'El formulario contiene errores.'
                ]);
            }
        });
    }

    public function updatedEstadoId($value){
        $this->localidad_id = '';
        $this->servred['cuarto_id']= '';
    }
    public function updatedLocalidadId($value){        
        $this->servred['cuarto_id']= '';
    }


    #[Computed()]
    public function localidades()
    {
        return Localidad::where('estado_id', $this->estado_id)->get();
    }
    #[Computed()]
    public function cuartos()
    {
        return Cuarto::where('localidad_id', $this->localidad_id)->get();
    }

    public function store()
    {

        $this->validate([
            'image_path' => 'required|image|max:8024',
            'servred.equip_type' => 'required',
            'servred.equip_marca' => 'required|max:255',
            'servred.equip_modelo' => 'required|max:255',
            'servred.equip_serial' => 'required|max:255',
            'servred.code_inv' => 'required|unique:servreds,code_inv',
            'servred.cant_puertos_dis' => 'required|max:255',
            'servred.cant_ports_oc' => 'required|max:255',
            'servred.cant_ports_total' => 'required|max:255',
            'servred.description' => 'required|max:500',
            'servred.cuarto_id' => 'required|exists:cuartos,id'
        ]); 

        $this->servred['image_path'] = $this->image_path->store('servreds');

        Servred::create($this->servred);

        session()->flash('swal' , [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Equipo de red creado satisfactoriamente.'
        ]);

        return redirect()->route('admin.servreds.index');

    }

    public function render()
    {
        return view('livewire.admin.servreds.servred-create');
    }
}
