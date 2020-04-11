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
        Schema::create('photo_logements', function (Blueprint $table) {
            $table->id('id_photo');
            $table->string('chemin_photo');

            $table->unsignedBigInteger('detail_logement_id');
            $table->foreign('detail_logement_id')
                ->references('id_detail')
                ->on('detail_logements');
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
        Schema::dropIfExists('photo_logements');
    }
}