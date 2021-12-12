<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGropementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gropements', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->integer("tel");
            $table->integer("fix");
            $table->string("email");
            $table->string("adress");
            $table->string("paye");
            $table->string("ville");
            $table->integer("page_facebook");
            $table->boolean("active");

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
        Schema::dropIfExists('gropements');
    }
}
