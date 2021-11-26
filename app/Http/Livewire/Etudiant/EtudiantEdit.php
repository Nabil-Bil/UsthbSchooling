<?php

namespace App\Http\Livewire\Etudiant;

use App\Models\Section;
use Livewire\Component;
use App\Models\Etudiant;
use Illuminate\Http\Request;


class EtudiantEdit extends Component
{
    public $sections;
    public $matricule;
    public $etudiant;
    public $readonly="readonly";
    public $matricule_readonly="";
    public $disabled="disabled";
    public $search_disabled="";

    public function search()
    {
        $this->resetErrorBag();
        if(Etudiant::etudiantExists($this->matricule)){
            session()->flash('message_valide','Etudiant existant') ;
            $this->etudiant=Etudiant::find($this->matricule)->getAttributes();
            $this->readonly='';
            $this->disabled='';
            
        }
        else{
            session()->flash('message_non_valide','Etudiant  inexistant') ;
            $this->etudiant=[];
            $this->readonly='readonly';
            $this->disabled="disabled";
        }
        
    }

    public function submit()
    {
        if(Etudiant::etudiantExists($this->matricule)){
            session()->flash('submit','Voulez-vous Modifier?');
            $this->readonly="readonly";
            $this->matricule_readonly="readonly";
            $this->disabled='disabled';
            $this->search_disabled='disabled';
        }
        else{
            session()->flash('message_non_valide','Etudiant  inexistant') ;
            $this->etudiant=[];
            $this->readonly='';
            $this->disabled='disabled';
        }
        
    }
   

    public function no()
    {
        session()->flash('no','Modification annulé');
    }
    
    public function mount()
    {
        $this->sections=Section::all();
    }

    public function render()
    {
        return view('livewire.etudiant.etudiant-edit');
    }
}