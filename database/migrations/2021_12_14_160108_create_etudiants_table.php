<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->string("matricule");
            $table->string("nom");
            $table->string("prénom");
            $table->tinyInteger("groupe");
            $table->unsignedBigInteger('codeS');
            $table->foreign("codeS")->references('codeS')->on('sections')->nullable();
            $table->primary("matricule");

            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
