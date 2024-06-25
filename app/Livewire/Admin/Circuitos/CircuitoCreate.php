<?php

namespace App\Livewire\Admin\Circuitos;

use App\Models\Circuito;
use App\Models\Estado;
use App\Models\Localidad;
use App\Models\Region;
use App\Models\Cuarto;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class CircuitoCreate extends Component
{
    use WithFileUploads;
    public $estados;
    public $estado_id='';
    public $localidad_id='';
        

    public $image_path;   

   /*  public $cuartos;
    public $cuarto_id =''; */

    public $circuito = [
      'circuito_num' => '',
      'type' => '',
      'ipwan' => '',
      'iplan_bloq' => '',
      'ip_sw' => '',
      'vlan' => '',
      'ip_loopback' => '',
      'description' => '',
      'short_description' => '',
      'image_path' => '',
      'cuarto_id' => ''
    ];

    public function mount(){

         /* $this->regions = Region::all(); */         
         $this->estados = Estado::all();         
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
        $this->circuito['cuarto_id']= '';
    }
    public function updatedLocalidadId($value){        
        $this->circuito['cuarto_id']= '';
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
            'image_path' => 'required|image|max:8024',
            'circuito.circuito_num' => 'required|unique:circuitos,circuito_num',
            'circuito.type' => 'required',
            'circuito.ipwan' => 'required|max:255',
            'circuito.iplan_bloq' => 'required|max:255',
            'circuito.ip_sw' => 'required|max:255',
            'circuito.vlan' => 'required|max:255',
            'circuito.ip_loopback' => 'required|max:255',
            'circuito.description' => 'required|max:500',
            'circuito.short_description' => 'required|max:30',
            'circuito.cuarto_id' => 'required|exists:cuartos,id'
         ]);                   
    
        $this->circuito['image_path'] = $this->image_path->store('circuitos');

        Circuito::create($this->circuito);

        session()->flash('swal' , [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Circuito creado satisfactoriamente.'
        ]);
        return redirect()->route('admin.circuitos.index');                
    }
    



    public function render()
    {
        return view('livewire.admin.circuitos.circuito-create');
    }
}
