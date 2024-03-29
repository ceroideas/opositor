<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemaSeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tema_seccion', function (Blueprint $table) {
            $table->id();
	    $table->string('title');
	    $table->integer('tema_id');
	   //$table->unsignedBigInteger('tema_id');
	   //$table->foreign('tema_id')->references('id')->on('temas');
	    $table->string('type');
	    $table->string('difficulty');
	    $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	//Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('tema_seccion');
    }
}
