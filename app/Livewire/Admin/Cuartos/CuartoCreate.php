<?php

namespace App\Livewire\Admin\Cuartos;

use Livewire\Component;
use App\Models\Region;
use App\Models\Estado;
use App\Models\Localidad;
use Livewire\Attributes\Computed;
use Livewire\WithFileUploads;

class CuartoCreate extends Component
{
    use WithFileUploads;
    public $regions;    
    public $region_id='';
    public $estado_id='';

    public $image_1;
    public $image_2;
    public $image_3;
    public $image_4;

    public $cuarto = [
        'name' => '',
        'jefe' => '',
        'status' => '',
        'photo_1' => '',
        'photo_2' => '',
        'photo_3' => '',
        'photo_4' => '',
        'localidad_id' => ''
    ];

    public function mount(){

        $this->regions = Region::all();
    }

    public function updatedRegionId($value){
        $this->estado_id = '';
        $this->cuarto['localidad_id']= '';
    }
    public function updatedEstadoId($value){        
        $this->cuarto['localidad_id']= '';
    }

    #[Computed()]
    public function estados(){
        return Estado::where('region_id', $this->region_id)->get();    
    } 
    #[Computed()]
    public function localidades(){
        return Localidad::where('estado_id', $this->estado_id)->get();    
    } 

    public function render()
    {        
        return view('livewire.admin.cuartos.cuarto-create');
    }
}
