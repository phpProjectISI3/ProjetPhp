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
        Schema::create('auth_role_personnes', function (Blueprint $table) {
            $table->unsignedBigInteger('personne_role_');
            $table->foreign('personne_role_')
                ->references('id_client')
                ->on('personnes')->onDelete('cascade');

            $table->unsignedBigInteger('auth_role_');
            $table->foreign('auth_role_')
                ->references('id_role')
                ->on('auth_roles')->onDelete('cascade');

            $table->primary(['personne_role_', 'auth_role_']);

            $table->string('username_email', 50);
            $table->string('mot_de_passe', 100);
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
        Schema::dropIfExists('auth_role_personnes');
    }
}