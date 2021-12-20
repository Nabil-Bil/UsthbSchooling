<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isEmpty;

class Etudiant extends Model
{
    use HasFactory;

    protected $guarded=[];
    public $timestamps = false;

    protected $primaryKey='matricule';

    static public function etudiantExists($matricule)
    {
        if(Empty(Etudiant::get()->where('matricule',$matricule)->toArray())){
           return false;
        }
        else
        {
            return true;
        }
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class,'examens','matricule','codeM');
    }

    public function set_note($module,$note)
    {
        return $this->modules()->updateExistingPivot($module,['note'=>$note]);
    }
}
