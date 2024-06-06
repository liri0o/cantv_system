<?php

namespace App\Livewire\Admin\Necesidads;

use Livewire\Component;
use App\Models\Cuarto;
use App\Models\Estado;
use App\Models\Localidad;
use Livewire\Attributes\Computed;

class NecesidadEdit extends Component
{
    public $necesidad;
    public $necesidadEdit;

    public $estados;
    public $estado_id = '';
    public $localidad_id = '';


    public function mount($necesidad)
    {
        $this->necesidadEdit = $necesidad->only(
            //sobre el mantenimiento

            'cable_elim',
            'cajas_des_elim',
            'elim_desin_equip_com',
            'inv_etq_equip_com',
            'cable_vd_org',
            'bable_elec_org',

            //sobre la adecuación

            'mtto_general',
            'rack_piso',
            'rack_pared',
            'bandeja_equip_norack',
            'panel_dis',
            'conector_rojo',
            'conector_gris',
            'pathcord_rojo',
            'pathcord_azul',
            'pathcord_router_sw',
            'faceplate',
            'wallbox',
            'front_back_x',
            'front',
            'front_back_y',
            'regleta_tlf',
            'regleta_rack',
            'conectores_4pares',
            'conectores_5pares',
            'cable_multipar_tlf',
            'switch',
            'router',
            'multitoma',
            'ups',
            //sobre la construcción
            'cant_punt_datos',
            'cant_punt_voz',

            'cuarto_id'
        );

        $this->estados = Estado::all();
        $this->localidad_id =  $necesidad->cuarto->localidad->id;
        $this->estado_id = $necesidad->cuarto->localidad->estado_id;
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
        $this->necesidadEdit['cuarto_id']= '';
    }
    public function updatedLocalidadId($value){        
        $this->necesidadEdit['cuarto_id']= '';
    }

    #[Computed()]
    public function localidades(){
        return Localidad::where('estado_id', $this->estado_id)->get();    
    } 
    #[Computed()]
    public function cuartos(){
        return Cuarto::where('localidad_id', $this->localidad_id)->get();    
    }


    public function store()
    {
        $this->validate([

        //sobre el mantenimiento

        'necesidadEdit.cable_elim' => 'required|min:0|max:255',
        'necesidadEdit.cajas_des_elim' => 'required|min:0|max:255',
        'necesidadEdit.elim_desin_equip_com' => 'required|min:0|max:255',
        'necesidadEdit.inv_etq_equip_com' => 'required|min:0|max:255',
        'necesidadEdit.cable_vd_org' => 'required|min:0|max:255',
        'necesidadEdit.bable_elec_org' => 'required|min:0|max:255',

        //sobre la adecuación

        'necesidadEdit.mtto_general' => 'required|min:0|max:255',
        'necesidadEdit.rack_piso' => 'required|min:0|max:255',
        'necesidadEdit.rack_pared' => 'required|min:0|max:255',
        'necesidadEdit.bandeja_equip_norack' => 'required|min:0|max:255',
        'necesidadEdit.panel_dis' => 'required|min:0|max:255',
        'necesidadEdit.conector_rojo' => 'required|min:0|max:255',
        'necesidadEdit.conector_gris' => 'required|min:0|max:255',
        'necesidadEdit.pathcord_rojo' => 'required|min:0|max:255',
        'necesidadEdit.pathcord_azul' => 'required|min:0|max:255',
        'necesidadEdit.pathcord_router_sw' => 'required|min:0|max:255',
        'necesidadEdit.faceplate' => 'required|min:0|max:255',
        'necesidadEdit.wallbox' => 'required|min:0|max:255',
        'necesidadEdit.front_back_x' => 'required|min:0|max:255',
        'necesidadEdit.front' => 'required|min:0|max:255',
        'necesidadEdit.front_back_y' => 'required|min:0|max:255',
        'necesidadEdit.regleta_tlf' => 'required|min:0|max:255',
        'necesidadEdit.regleta_rack' => 'required|min:0|max:255',
        'necesidadEdit.conectores_4pares' => 'required|min:0|max:255',
        'necesidadEdit.conectores_5pares' => 'required|min:0|max:255',
        'necesidadEdit.cable_multipar_tlf' => 'required|min:0|max:255',
        'necesidadEdit.switch' => 'required|min:0|max:255',
        'necesidadEdit.router' => 'required|min:0|max:255',
        'necesidadEdit.multitoma' => 'required|min:0|max:255',
        'necesidadEdit.ups' => 'required|min:0|max:255',

        //sobre la construcción
        'necesidadEdit.cant_punt_datos' => 'required|min:0|max:255',
        'necesidadEdit.cant_punt_voz' => 'required|min:0|max:255',

        'necesidadEdit.cuarto_id' => 'required|exists:cuartos,id'       

        ]);
        
        $this->necesidad->update($this->necesidadEdit);
        $this->dispatch('swal' , [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Necesidad modificada satisfactoriamente.'
        ]);

        return redirect()->route('admin.necesidads.index');
    }

    public function render()
    {
        return view('livewire.admin.necesidads.necesidad-edit');
    }
}
