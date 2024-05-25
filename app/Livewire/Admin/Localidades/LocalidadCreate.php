<?php

namespace App\Livewire\Admin\Localidades;

use App\Models\Region;
use App\Models\Estado;
use App\Models\Localidad;
use Livewire\Attributes\Computed;
use Livewire\Component;

class LocalidadCreate extends Component
{
    public $regions;

    public $localidad = [
        'region_id' => '',
        'estado_id' => '',
        'name' => ''

    ];

    #[Computed()]  
    public function estados()
    {
       return Estado::where('region_id', $this->localidad['region_id'])->get();    
    }

    public function mount(){
        $this->regions = Region::all();
    }

    public function updatedLocalidadRegionId()
    {
        $this->localidad['estado_id'] = '';
    }

    public function save(){
        $this->validate([
            'localidad.region_id' => 'required|exists:regions,id',
            'localidad.estado_id' => 'required|exists:estados,id',
            'localidad.name' => 'required'
        ],[],[
            'localidad.region_id' => 'región',
            'localidad.estado_id' => 'estado',
            'localidad.name' => 'nombre'
        ]);

        Localidad::create($this->localidad);
        session()->flash('swal' , [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Localidad creada satisfactoriamente.'
        ]);

        return redirect()->route('admin.localidades.index');
    }//LETS GET IT

    public function render()
    {
        return view('livewire.admin.localidades.localidad-create');
    }
}
