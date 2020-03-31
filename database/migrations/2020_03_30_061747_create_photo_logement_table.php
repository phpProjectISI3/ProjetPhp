<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoLogementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_logements', function (Blueprint $table) {
            $table->id('id_photo');
            $table->string('chemin_photo');

            $table->unsignedBigInteger('logement_id');
            $table->foreign('logement_id')->references('id_logement')->on('logements');
                        
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
        Schema::dropIfExists('photos_logements');
    }
}
