<?php

namespace App\Livewire\Admin\Servreds;

use Livewire\Component;
use App\Models\Cuarto;
use App\Models\Estado;
use App\Models\Localidad;
use Livewire\Attributes\Computed;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ServredEdit extends Component
{
    use WithFileUploads;
    public $servred;
    public $servredEdit;

    public $estados;
    public $estado_id = '';
    public $localidad_id = '';

    public $image_path;

    public function mount($servred)
    {

        $this->servredEdit = $servred->only(

            'equip_type',
            'equip_marca',
            'equip_modelo',
            'equip_serial',
            'code_inv',
            'cant_puertos_dis',
            'cant_ports_oc',
            'cant_ports_total',
            'description',
            'image_path',
            'cuarto_id'

        );

        $this->estados = Estado::all(); 
        $this->localidad_id =  $servred->cuarto->localidad->id;
        $this->estado_id = $servred->cuarto->localidad->estado_id;
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
        $this->servredEdit['cuarto_id']= '';
    }
    public function updatedLocalidadId($value){        
        $this->servredEdit['cuarto_id']= '';
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
            'servredEdit.equip_type' => 'required',
            'servredEdit.equip_marca' => 'required|max:255',
            'servredEdit.equip_modelo' => 'required|max:255',
            'servredEdit.equip_serial' => 'required|max:255',
            'servredEdit.code_inv' => 'required|unique:servreds,code_inv,' .  $this->servred->id,
            'servredEdit.cant_puertos_dis' => 'required|max:255',
            'servredEdit.cant_ports_oc' => 'required|max:255',
            'servredEdit.cant_ports_total' => 'required|max:255',
            'servredEdit.description' => 'required|max:500',
            'servredEdit.cuarto_id' => 'required|exists:cuartos,id'
        ]); 

        if($this->image_path){

            Storage::delete($this->servredEdit['image_path']);
            $this->servredEdit['image_path'] = $this->image_path->store('servreds');
        }

        $this->servred->update($this->servredEdit);
        $this->dispatch('swal' , [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Equipo modificado satisfactoriamente.'
        ]);

        return redirect()->route('admin.servreds.index');

    }

    public function render()
    {
        return view('livewire.admin.servreds.servred-edit');
    }
}
