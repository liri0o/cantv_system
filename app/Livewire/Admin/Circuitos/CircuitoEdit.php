<?php

namespace App\Livewire\Admin\Circuitos;

use App\Models\Cuarto;
use App\Models\Estado;
use App\Models\Localidad;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CircuitoEdit extends Component
{
    use WithFileUploads;
    public $circuito;
    public $circuitoEdit;

    public $estados;
    public $estado_id='';
    public $localidad_id='';

    public $image_path; 

    public function mount($circuito){
        $this->circuitoEdit = $circuito->only(
            'type',
            'circuito_num',
            'ipwan',
            'iplan_bloq',
            'ip_sw',
            'vlan',
            'ip_loopback',
            'description',
            'short_description',
            'image_path',
            'cuarto_id'
        );

        $this->estados = Estado::all(); 
        $this->localidad_id =  $circuito->cuarto->localidad->id;
        $this->estado_id = $circuito->cuarto->localidad->estado_id;
    }

    public function boot(){

        $this->withValidator(function ($validator){

            if($validator->fails()){

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
        $this->circuitoEdit['cuarto_id']= '';
    }
    public function updatedLocalidadId($value){        
        $this->circuitoEdit['cuarto_id']= '';
    }

    #[Computed()]
    public function localidades(){
        return Localidad::where('estado_id', $this->estado_id)->get();    
    } 
    #[Computed()]
    public function cuartos(){
        return Cuarto::where('localidad_id', $this->localidad_id)->get();    
    }

    public function store(){

        $this->validate([
            'image_path' => 'nullable|image|max:8024',
            'circuitoEdit.circuito_num' => 'required|unique:circuitos,circuito_num,' . $this->circuito->id,
            'circuitoEdit.type' => 'required',
            'circuitoEdit.ipwan' => 'required|max:255',
            'circuitoEdit.iplan_bloq' => 'required|max:255',
            'circuitoEdit.ip_sw' => 'required|max:255',
            'circuitoEdit.vlan' => 'required|max:255',
            'circuitoEdit.ip_loopback' => 'required|max:255',
            'circuitoEdit.description' => 'required|max:500',
            'circuitoEdit.short_description' => 'required|max:30',
            'circuitoEdit.cuarto_id' => 'required|exists:cuartos,id'
         ]);  

         if($this->image_path){

            Storage::delete($this->circuitoEdit['image_path']);
            $this->circuitoEdit['image_path'] = $this->image_path->store('circuitos');
        }

        $this->circuito->update($this->circuitoEdit);
        $this->dispatch('swal' , [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Circuito modificado satisfactoriamente.'
        ]);

        return redirect()->route('admin.circuitos.index');

    }




    public function render()
    {
        return view('livewire.admin.circuitos.circuito-edit');
    }
}
