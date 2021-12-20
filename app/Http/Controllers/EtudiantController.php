<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Module;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mod;

class EtudiantController extends Controller
{
    public function index()
    {
        return view('etudiant.etudiant-index');
    }

    public function create()
    {

        return view('etudiant.etudiant-create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'matricule'=>['required','size:12'],
            'nom'=>['required',],
            'prénom'=>['required'],
            'section'=>['required'],
            'groupe'=>['required','numeric'],
        ]
        );
        if(!Etudiant::etudiantExists($request->matricule))
        {
            $all_modules=Module::get();
            
            $etudiant=new Etudiant();
            $etudiant->matricule=$request->matricule;
            $etudiant->prénom=$request->prénom;
            $etudiant->nom=$request->nom;
            $etudiant->groupe=$request->groupe;
            $etudiant->codeS=$request->section;
            
            $etudiant->save();
            $etudiant=Etudiant::find($request->matricule);
            
            foreach($all_modules as $module){
                $etudiant->modules()->attach($module->codeM,['matricule'=>$etudiant->matricule]);
            }
            

            

            
    
            $request->session()->flash('yes','Ajout fait avec succès');
            
        }
        else{
            $request->session()->flash('no','Ajout Annulé');
        }
     
        return redirect()->back();
    }

    public function edit()
    {
        return view('etudiant.etudiant-edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'matricule'=>['required','size:12'],
            'nom'=>['required',],
            'prénom'=>['required'],
            'section'=>['required'],
            'groupe'=>['required','numeric'],
        ]
        );

        if(!Etudiant::etudiantExists($request->matricule))
        {
            $request->session()->flash('no','Modification Annulé');
            
        }
        else{
            Etudiant::where('matricule',$request->matricule)->update([
                'matricule'=>$request->matricule,
                'nom'=>$request->nom,
                'prénom'=>$request->prénom,
                'codeS'=>$request->section,
                'groupe'=>$request->groupe,
            ]);
            $request->session()->flash('yes','Modification faite avec succès');
        }
        
        return redirect()->back();
        
        
    }


    public function delete()
    {
        return view('etudiant.etudiant-delete');
    }


    public function destroy(Request $request)
    {
        if(Etudiant::etudiantExists($request->matricule))
        {
            Etudiant::where('matricule',$request->matricule)->delete();
            $request->session()->flash('yes','Suppression faite avec succès');
            
        }
        else{
            $request->session()->flash('no','Suppression Annulé');
        }
        

        return redirect()->back();
        
    }
}
