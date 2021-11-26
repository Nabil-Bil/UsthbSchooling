<?php

namespace App\Http\Livewire\Etudiant;

use App\Models\Section;
use Livewire\Component;
use App\Models\Etudiant;


class EtudiantDelete extends Component
{
    public $matricule;
    public $etudiant;
    public $matricule_readonly="";
    public $disabled="disabled";
    public $search_disabled="";
    public $sections;

    public function search()
    {
        if(Etudiant::etudiantExists($this->matricule)){
            session()->flash('message_valide','Etudiant existant') ;
            $this->etudiant=Etudiant::find($this->matricule)->getAttributes();
            $this->disabled='';
        }
        else{
            session()->flash('message_non_valide','Etudiant  inexistant ') ;
            $this->etudiant=[];
            $this->disabled='disabled';
            
        }
        
    }

    public function submit()
    {
        if(Etudiant::etudiantExists($this->matricule)){
            session()->flash('submit','Voulez-vous Supprimer?');
            $this->matricule_readonly="readonly";
            $this->disabled='disabled';
            $this->search_disabled='disabled';
        }
        else{
            session()->flash('message_non_valide','Etudiant  inexistant') ;
            $this->etudiant=[];
            $this->disabled='disabled';
        }
    }


    public function no()
    {
        session()->flash('no','Suppression annulé');
    }
    
    public function mount()
    {
        $this->sections=Section::all();
    }

    public function render()
    {
        return view('livewire.etudiant.etudiant-delete');
    }
}