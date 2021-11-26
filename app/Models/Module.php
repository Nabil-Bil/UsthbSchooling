<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
