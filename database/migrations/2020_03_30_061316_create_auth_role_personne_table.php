<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthRolePersonneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_roles_personnes', function (Blueprint $table) {
           
            $table->unsignedBigInteger('personne_id');
            $table->foreign('personne_id')->references('id_client')->on('personnes');

            $table->unsignedBigInteger('auth_role_id');
            $table->foreign('auth_role_id')->references('id_role')->on('auth_roles');
           
            $table->string('username_email');
            $table->string('mot_de_passe');
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
        Schema::dropIfExists('auth_roles_personnes');
    }
}
