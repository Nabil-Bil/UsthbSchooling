<?php

namespace App\Models;

use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $guarded=[];
    public $timestamps = false;
    protected $primaryKey='codeM';

    static public function moduleExists($codeM)
    {
        if(Empty(Module::get()->where('codeM',$codeM)->toArray())){
           return false;
        }
        else
        {
            return true;
        }
    }
    public function etudiants(){
        return $this->belongsToMany(Etudiant::class,'examens','codeM','matricule');
    }
    public function etudiants_without_note()
    {
        return $this->belongsToMany(Etudiant::class,'examens','codeM','matricule')->wherePivot('note','=',null);
    }

}
