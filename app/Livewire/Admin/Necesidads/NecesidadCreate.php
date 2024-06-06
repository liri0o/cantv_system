<?php

namespace App\Livewire\Admin\Necesidads;

use Livewire\Component;
use App\Models\Estado;
use App\Models\Localidad;
use App\Models\Region;
use App\Models\Cuarto;
use App\Models\Necesidad;
use Livewire\Attributes\Computed;

class NecesidadCreate extends Component
{
    public $estados;
    public $estado_id = '';
    public $localidad_id = '';

    public $necesidad = [
        //sobre el mantenimiento

        'cable_elim' => '',
        'cajas_des_elim' => '',
        'elim_desin_equip_com' => '',
        'inv_etq_equip_com' => '',
        'cable_vd_org' => '',
        'bable_elec_org' => '',

        //sobre la adecuación

        'mtto_general' => '',
        'rack_piso' => '',
        'rack_pared' => '',
        'bandeja_equip_norack' => '',
        'panel_dis' => '',
        'conector_rojo' => '',
        'conector_gris' => '',
        'pathcord_rojo' => '',
        'pathcord_azul' => '',
        'pathcord_router_sw' => '',
        'faceplate' => '',
        'wallbox' => '',
        'front_back_x' => '',
        'front' => '',
        'front_back_y' => '',
        'regleta_tlf' => '',
        'regleta_rack' => '',
        'conectores_4pares' => '',
        'conectores_5pares' => '',
        'cable_multipar_tlf' => '',
        'switch' => '',
        'router' => '',
        'multitoma' => '',
        'ups' => '',

        //sobre la construcción
        'cant_punt_datos' => '',
        'cant_punt_voz' => '',

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


    public function updatedEstadoId($value)
    {
        $this->localidad_id = '';
        $this->necesidad['cuarto_id'] = '';
    }
    public function updatedLocalidadId($value)
    {
        $this->necesidad['cuarto_id'] = '';
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

        //sobre el mantenimiento

        'necesidad.cable_elim' => 'required|min:0|max:255',
        'necesidad.cajas_des_elim' => 'required|min:0|max:255',
        'necesidad.elim_desin_equip_com' => 'required|min:0|max:255',
        'necesidad.inv_etq_equip_com' => 'required|min:0|max:255',
        'necesidad.cable_vd_org' => 'required|min:0|max:255',
        'necesidad.bable_elec_org' => 'required|min:0|max:255',

        //sobre la adecuación

        'necesidad.mtto_general' => 'required|min:0|max:255',
        'necesidad.rack_piso' => 'required|min:0|max:255',
        'necesidad.rack_pared' => 'required|min:0|max:255',
        'necesidad.bandeja_equip_norack' => 'required|min:0|max:255',
        'necesidad.panel_dis' => 'required|min:0|max:255',
        'necesidad.conector_rojo' => 'required|min:0|max:255',
        'necesidad.conector_gris' => 'required|min:0|max:255',
        'necesidad.pathcord_rojo' => 'required|min:0|max:255',
        'necesidad.pathcord_azul' => 'required|min:0|max:255',
        'necesidad.pathcord_router_sw' => 'required|min:0|max:255',
        'necesidad.faceplate' => 'required|min:0|max:255',
        'necesidad.wallbox' => 'required|min:0|max:255',
        'necesidad.front_back_x' => 'required|min:0|max:255',
        'necesidad.front' => 'required|min:0|max:255',
        'necesidad.front_back_y' => 'required|min:0|max:255',
        'necesidad.regleta_tlf' => 'required|min:0|max:255',
        'necesidad.regleta_rack' => 'required|min:0|max:255',
        'necesidad.conectores_4pares' => 'required|min:0|max:255',
        'necesidad.conectores_5pares' => 'required|min:0|max:255',
        'necesidad.cable_multipar_tlf' => 'required|min:0|max:255',
        'necesidad.switch' => 'required|min:0|max:255',
        'necesidad.router' => 'required|min:0|max:255',
        'necesidad.multitoma' => 'required|min:0|max:255',
        'necesidad.ups' => 'required|min:0|max:255',

        //sobre la construcción
        'necesidad.cant_punt_datos' => 'required|min:0|max:255',
        'necesidad.cant_punt_voz' => 'required|min:0|max:255',

        'necesidad.cuarto_id' => 'required|exists:cuartos,id'

        ]);

        Necesidad::create($this->necesidad);

        session()->flash('swal' , [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Necesidad creada satisfactoriamente.'
        ]);
        return redirect()->route('admin.necesidads.index'); 

    }


    public function render()
    {
        return view('livewire.admin.necesidads.necesidad-create');
    }
}
