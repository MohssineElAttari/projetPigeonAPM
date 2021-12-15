<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociationGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('association_groups', function (Blueprint $table) {
            $table->id();
            $table->string("logo");
            $table->string("nom_asso");
            $table->string("type");
            $table->string("prenom_res");
            $table->string("nom_res");
            $table->string("abreviation");
            $table->integer("tel");
            $table->integer("fix");
            $table->text("adresse");
            $table->string("pays");
            $table->string("ville");
            $table->string("page");
            $table->boolean("active");
            $table->string("email")->unique();
            $table->string("password");
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
        Schema::dropIfExists('association_groups');
    }
}


