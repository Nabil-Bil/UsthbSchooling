<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $primaryKey= 'codeEns';
    protected $guarded=[];
    public $timestamps=false;
}
