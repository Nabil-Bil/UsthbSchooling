<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('etudiant.etudiant-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('etudiant.etudiant-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $etudiant=new Etudiant();
            $etudiant->matricule=$request->matricule;
            $etudiant->prenom=$request->prénom;
            $etudiant->nom=$request->nom;
            $etudiant->groupe=$request->groupe;
            $etudiant->codeS=$request->section;
    
            $etudiant->save();
    
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
                'prenom'=>$request->prénom,
                'codeS'=>$request->section,
                'groupe'=>$request->groupe,
            ]);
            $request->session()->flash('yes','Modification faite avec succès');
        }
        
        return redirect()->back();
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        return view('etudiant.etudiant-delete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
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
