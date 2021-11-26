<?php

namespace App\Http\Livewire\Module;

use App\Models\Module;
use Livewire\Component;
use App\Models\Enseignant;

class ModuleDelete extends Component
{
    public $enseignants;
    public $codeM;
    public $module;
    public $codeM_readonly="";
    public $disabled="disabled";
    public $search_disabled="";

    public function search()
    {
        if(Module::moduleExists($this->codeM)){
            session()->flash('message_valide','Module existant') ;
            $this->module=Module::find($this->codeM)->getAttributes();
            $this->disabled="";
            
        }
        else{
            session()->flash('message_non_valide','Module  inexistant') ;
            $this->module=[];
            $this->disabled='disabled';
            
        }
        
    }

    public function submit()
    {
        if(Module::moduleExists($this->codeM)){
            session()->flash('submit','Voulez-vous Supprimer?');
            $this->codeM_readonly="readonly";
            $this->disabled='disabled';
            $this->search_disabled='disabled';
        }
        else{
            session()->flash('message_valide','Module existant') ;
            $this->module=[];
            $this->disabled="disabled";
        }

        
        
    }

    public function no()
    {
        session()->flash('no','Suppression annulé');
    }
    
    public function mount()
    {
        $this->enseignants=Enseignant::all();
    }


    
    public function render()
    {
        return view('livewire.module.module-delete');
    }
}
