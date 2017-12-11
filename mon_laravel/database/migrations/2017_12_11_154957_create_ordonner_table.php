<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdonnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::create('ordonner', function (Blueprint $table) {
            $table->date('finPeriode');
	    $table->integer('idUser')->unsigned()->foreign()->references('idUser')->on('users');
	    $table->integer('idPlace')->unsigned()->foreign()->references('idPlace')->on('place');
	    $table->date('DebutPeriode')->foreign()->references('DebutPeriode')->on('periode');
	    $table->primary(array('DebutPeriode','idPlace','idUser'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordonner');
    }
}
