<?php

namespace App\Livewire\Admin\Cuartos;

use Livewire\Component;
use App\Models\Region;
use App\Models\Estado;
use App\Models\Cuarto;
use Livewire\Attributes\Computed;
use App\Models\Localidad;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class CuartoEdit extends Component
{
    use WithFileUploads;

    public $cuarto;
    public $cuartoEdit;

    public $regions;    
    public $region_id='';
    public $estado_id='';

    public $photo_1;
    public $photo_2;
    public $photo_3;
    public $photo_4;

    public function mount($cuarto){        

       $this->cuartoEdit = $cuarto->only(
            'name',
            'status', 
            'jefe',
            'localidad_id',
            'photo_1',
            'photo_2',
            'photo_3', 
            'photo_4',
            //circuito 
            //serv red
            'equip_type',
            'equip_marca',
            'equip_modelo',
            'equip_serial',
            'code_inv',
            'cant_puertos_dis',
            'cant_ports_oc',
            'cant_ports_total',
            //servoz
            'cant_tlf_total_fxb', 
            'cant_tlf_oc_fxb',
            'cant_tlf_dis_fxb',
            'cant_tlf_line' 
        );

        $this->regions = Region::all();

        $this->estado_id = $cuarto->localidad->estado->id;
        $this->region_id = $cuarto->localidad->estado->region_id;        

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
        $this->cuartoEdit['localidad_id']= '';
    }

    public function updatedEstadoId($value){        
        $this->cuartoEdit['localidad_id']= '';
    }
    
    #[Computed()]
    public function estados(){
        return Estado::where('region_id', $this->region_id)->get();    
    } 
    #[Computed()]
    public function localidades(){
        return Localidad::where('estado_id', $this->estado_id)->get();    
    } 

    public function store(){
        $this->validate([

            //info general
            'photo_1' => 'nullable|image|max:8024',
            'photo_2' => 'nullable|image|max:8024',            
            'cuartoEdit.name' => 'required|min:3|max:100,',
            'cuartoEdit.jefe' => 'required|max:255',
            'cuartoEdit.status' => 'max:15',           
            'cuartoEdit.localidad_id' => 'required|exists:localidads,id',

            'cuartoEdit.cant_tlf_total_fxb' => 'required|max:255',
            'cuartoEdit.cant_tlf_oc_fxb' => 'required|max:255',
            'cuartoEdit.cant_tlf_dis_fxb' => 'required|max:255',
            'cuartoEdit.cant_tlf_line'  => 'required|max:255'
        ]);

        if($this->photo_1){

            Storage::delete($this->cuartoEdit['photo_1']);
            $this->cuartoEdit['photo_1'] = $this->photo_1->store('cuartos');
        }
        if($this->photo_2){

            Storage::delete($this->cuartoEdit['photo_2']);
            $this->cuartoEdit['photo_2'] = $this->photo_2->store('cuartos');
        }
        if($this->photo_3){

            Storage::delete($this->cuartoEdit['photo_3']);
            $this->cuartoEdit['photo_3'] = $this->photo_3->store('cuartos');
        }
        if($this->photo_4){

            Storage::delete($this->cuartoEdit['photo_4']);
            $this->cuartoEdit['photo_4'] = $this->photo_4->store('cuartos');
        }

        $this->cuarto->update($this->cuartoEdit);
        $this->dispatch('swal' , [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Cuarto modificado satisfactoriamente.'
        ]);

        return redirect()->route('admin.cuartos.index');
    }

    public function render()
    {
        return view('livewire.admin.cuartos.cuarto-edit');
    }
}
