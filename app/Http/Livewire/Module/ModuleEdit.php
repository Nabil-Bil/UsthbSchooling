<?php

namespace App\Http\Livewire\Module;

use App\Models\Module;
use Livewire\Component;
use App\Models\Enseignant;

class ModuleEdit extends Component
{
    public $enseignants;
    public $codeM;
    public $module;
    public $readonly="readonly";
    public $codeM_readonly="";
    public $disabled="disabled";
    public $search_disabled="";

    public function search()
    {
        $this->resetErrorBag();
        if(Module::moduleExists($this->codeM)){
            session()->flash('message_valide','Module existant') ;
            $this->module=Module::find($this->codeM)->getAttributes();
            
            $this->readonly='';
            $this->disabled='';
            
        }
        else{
            session()->flash('message_non_valide','Module  inexistant') ;
            $this->module=[];
            $this->readonly='readonly';
            $this->disabled="disabled";
            
            
        }
        
    }

    public function submit()
    {
        if(Module::moduleExists($this->codeM)){
            session()->flash('submit','Voulez-vous Modifier?');
            $this->readonly="readonly";
            $this->codeM_readonly="readonly";
            $this->disabled='disabled';
            $this->search_disabled='disabled';
        }
        else{
            session()->flash('message_non_valide','Module inexistant') ;
            $this->module=[];
            $this->readonly='readonly';
            $this->disabled="disabled";
        }

        
        
    }

    public function no()
    {
        session()->flash('no','Modification annulé');
    }
    
    public function mount()
    {
        $this->enseignants=Enseignant::all();
    }

    public function render()
    {
        return view('livewire.module.module-edit');
    }
}
