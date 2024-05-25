<?php

namespace App\Livewire\Admin\Localidades;

use Livewire\Component;
use App\Models\Region;
use App\Models\Estado;
use App\Models\Localidad;
use Livewire\Attributes\Computed;

class LocalidadEdit extends Component
{

    public $localidad;

    public $regions;

    public $localidadEdit;

    public function mount($localidad)
    {
        $this->regions = Region::all();

        $this->localidadEdit = [
            'region_id' => $localidad->estado->region_id ?? 'No hay nada',
            'estado_id' => $localidad->estado_id,
            'name' => $localidad->name
        ];
    }
    public function updatedLocalidadEditRegionId()
    {
        $this->localidadEdit['estado_id'] = '';
    }

    #[Computed()]  
    public function estados()
    {
       return Estado::where('region_id', $this->localidadEdit['region_id'])->get();    
    }

    public function save(){
        $this->validate([
            'localidadEdit.region_id' => 'required|exists:regions,id',
            'localidadEdit.estado_id' => 'required|exists:estados,id',
            'localidadEdit.name' => 'required'
        ]);
        $this->localidad->update($this->localidadEdit);
      
        /* session()->flash('swal' , [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Localidad editada satisfactoriamente.'
        ]); */

        return redirect()->route('admin.localidades.index');
    }


    public function render()
    {
        return view('livewire.admin.localidades.localidad-edit');
    }
}
