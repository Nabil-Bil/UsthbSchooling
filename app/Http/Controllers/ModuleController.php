<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        return view('module.module-index');
    }

    public function create()
    {

        return view('module.module-create');
    }

    public function edit()
    {
        return view('module.module-edit');
    }

    public function delete()
    {
        return view('module.module-delete');
    }

    public function store(Request $request)
    {

        $request->validate([
            'codeM'=>['required','numeric','min:0','integer'],
            'libellè'=>['required'],
            'coef'=>['required','numeric','max:10'],
            'enseignant'=>['required'],
        ]
        );
        if(!Module::moduleExists($request->codeM))
        {
            $etudiants=Etudiant::get();
            $module=new Module();
            $module->codeM=$request->codeM;
            $module->libelléM=$request->libellè;
            $module->coef=$request->coef;
            $module->codeEns=$request->enseignant;
            $module->save();
            $module=Module::find($request->codeM);
            foreach($etudiants as $etudiant){
                $module->etudiants()->attach($etudiant->matricule);
            }
            $request->session()->flash('yes','Ajout fait avec succès');
            
        }
        else{
            $request->session()->flash('no','Ajout Annulé');
        }
     
        return redirect()->back();
        
    }

    public function update(Request $request)
    {
        $request->validate([
            'codeM'=>['required','numeric','min:0','integer'],
            'libellè'=>['required'],
            'coef'=>['required','numeric','max:10'],
            'enseignant'=>['required'],
        ]
        );

        if(!Module::moduleExists($request->codeM))
        {
            $request->session()->flash('no','Modification Annulé');
            
        }

        else{
            Module::where('codeM',$request->codeM)->update([
                'codeM'=>$request->codeM,
                'libelléM'=>$request->libellè,
                'coef'=>$request->coef,
                'codeEns'=>$request->enseignant,
            ]);

            $request->session()->flash('yes','Modification faite avec succès');
        }
        
        return redirect()->back();

    }

    public function destroy(Request $request)
    {
        if(Module::moduleExists($request->codeM))
        {
            Module::where('codeM',$request->codeM)->delete();
            $request->session()->flash('yes','Suppression faite avec succès');
            
        }
        else{
            $request->session()->flash('no','Suppression Annulé');
        }
        

        return redirect()->back();
    }

}
