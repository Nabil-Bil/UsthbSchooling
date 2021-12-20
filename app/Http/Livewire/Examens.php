<?php

namespace App\Http\Livewire;

use App\Models\Module;
use Livewire\Component;
use App\Models\Etudiant;
use Illuminate\Support\Arr;

class Examens extends Component
{
    public $code_module;
    public $libellé;
    public $matricule;
    public $coefficient;
    public $note;
    public $modules=[];
    public $students=[];
    public $index;
    public $disabled;
    
    public function mount()
    {
        $this->modules=Module::orderBy('codeM')->get();
        foreach($this->modules as $module){
                    $this->students=Arr::add($this->students,$module->codeM,$module->etudiants_without_note);             
        }

        $this->index=array_key_first($this->students);
    }

    public function next_student()
    {
       
        if($this->note==null){
            session()->flash('note', 'veuillez saisir une note');

        }
        elseif(!is_numeric($this->note)){
            session()->flash('note', 'veuillez saisir un nombre');
        }
        elseif($this->note<0 or $this->note>20){
            session()->flash('note', 'veuillez saisir une note valide');
        }
        else{
            $module=Module::find($this->code_module);
            Etudiant::find($this->matricule)->set_note($module,$this->note);
            $this->note=null;
        }

        
    }

    public function nextModule()
    {
        
        $all_keys=array_keys($this->students);
        $next_key=array_search($this->index,array_keys($this->students))+1;
        if(array_key_exists($next_key,$all_keys)){
            $this->index=$all_keys[$next_key];
        }
        else{
            session()->flash('fin', 'vous etes arrivé au dernier module');
        }
        
        
        
    }

    

    
    public function render()
    {
        $this->modules=[];
        $this->students=[];
        $this->modules=Module::orderBy('codeM')->get();
        foreach($this->modules as $module){
                    $this->students=Arr::add($this->students,$module->codeM,$module->etudiants_without_note);             
        }
        if(!empty($this->students)){
            $this->code_module=$this->index;
            $this->libellé=Module::find($this->code_module)->libelléM;
            $this->coefficient=Module::find($this->code_module)->coef;
            if($this->students[$this->index]->first()==null){
                $this->matricule=null;
                $this->disabled="disabled";

            }
            else{
                $this->matricule=Arr::first($this->students[$this->code_module])->matricule;
                $this->disabled="";
            }
            
        }
        return view('livewire.examens');
    }
}
