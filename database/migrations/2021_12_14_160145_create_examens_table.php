<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examens', function (Blueprint $table) {
            $table->string("matricule",12);
           $table->foreign("matricule")->references("matricule")->on("etudiants")->onDelete('cascade');

           $table->unsignedBigInteger("codeM");
           $table->foreign("codeM")->references("codeM")->on("modules")->onDelete('cascade');

           $table->float("note")->nullable();

           $table->primary(array('matricule','codeM'));

        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examens');
    }
}
