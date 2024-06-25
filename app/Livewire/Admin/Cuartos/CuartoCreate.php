<?php

namespace App\Livewire\Admin\Cuartos;

use Livewire\Component;
use App\Models\Region;
use App\Models\Estado;
use App\Models\Cuarto;
use App\Models\Localidad;
use Livewire\Attributes\Computed;
use Livewire\WithFileUploads;

class CuartoCreate extends Component
{
    use WithFileUploads;
    public $regions;    
    public $region_id='';
    public $estado_id='';

    public $photo_1;
    public $photo_2;
 

    public $cuarto = [
        'name' => '',
        'jefe' => '',
        'status' => '',
        'photo_1' => '',
        'photo_2' => '',     
        'localidad_id' => '',   
        'description' => '',   
    
        //serv voz     
        'cant_tlf_total_fxb' => '',
        'cant_tlf_oc_fxb' => '',
        'cant_tlf_dis_fxb' => '',
        'cant_tlf_line'  => ''
    ];

    public function mount(){

        $this->regions = Region::all();
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


    public function store()
    {
        $this->validate([

            //info general
            'photo_1' => 'required|image|max:8024',
            'photo_2' => 'required|image|max:8024',         
            'cuarto.name' => 'required|max:255',
            'cuarto.jefe' => 'required|max:255',
            'cuarto.status' => 'max:15',           
            'cuarto.description' => 'max:255',           
            'cuarto.localidad_id' => 'required|exists:localidads,id', 
           
            //serv voz
            'cuarto.cant_tlf_total_fxb' => 'required|max:255',
            'cuarto.cant_tlf_oc_fxb' => 'required|max:255',
            'cuarto.cant_tlf_dis_fxb' => 'required|max:255',
            'cuarto.cant_tlf_line'  => 'required|max:255'
        ]);

        $this->cuarto['photo_1'] = $this->photo_1->store('cuartos');
        $this->cuarto['photo_2'] = $this->photo_2->store('cuartos');    
         $cuarto =  Cuarto::create($this->cuarto);

        session()->flash('swal' , [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Cuarto creado satisfactoriamente.'
        ]);

        return redirect()->route('admin.cuartos.index');
        
    }

    public function render()
    {        
        return view('livewire.admin.cuartos.cuarto-create');
    }
}
