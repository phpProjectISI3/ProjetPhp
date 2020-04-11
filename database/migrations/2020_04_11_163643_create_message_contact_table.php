<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_contacts', function (Blueprint $table) {
            $table->id('id_message');

            $table->unsignedBigInteger('emetteur_id');
            $table->foreign('emetteur_id')
                ->references('id_client')
                ->on('personnes');

            $table->unsignedBigInteger('recepteur_id');
            $table->foreign('recepteur_id')
                ->references('id_client')
                ->on('personnes');

            $table->text('Message_ecrit', 250);
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
        Schema::dropIfExists('message_contacts');
    }
}