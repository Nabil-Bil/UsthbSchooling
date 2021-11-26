<?php

namespace App\Http\Livewire\Etudiant;

use App\Models\Section;
use Livewire\Component;
use App\Models\Etudiant;
use Illuminate\Http\Request;


class EtudiantCreate extends Component
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
            $this->readonly='readonly';
            $this->disabled="disabled";
            
        }
        else{
            session()->flash('message_non_valide','Etudiant  inexistant veuillez saisir le reste des données') ;
            $this->etudiant=[];
            $this->readonly='';
            $this->disabled='';
            
        }
        
    }

    public function submit()
    {
        if(!Etudiant::etudiantExists($this->matricule)){
            session()->flash('submit','Voulez-vous ajouter?');
            $this->readonly="readonly";
            $this->matricule_readonly="readonly";
            $this->disabled='disabled';
            $this->search_disabled='disabled';
        }
        else{
            session()->flash('message_valide','Etudiant existant') ;
            $this->etudiant=[];
            $this->readonly='readonly';
            $this->disabled="disabled";
        }
        
    }


    public function no()
    {
        session()->flash('no','Ajout annulé');
    }
    
    public function mount()
    {
        $this->sections=Section::all();
    }

    public function render()
    {
        return view('livewire.etudiant.etudiant-create');
    }
}
