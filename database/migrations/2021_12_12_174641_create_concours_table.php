<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concours', function (Blueprint $table) {
            $table->id();
            $table->string("designation");
            $table->string("type");
            $table->string("etap");
            $table->double("pourcentage");
            $table->time('heure');
            $table->date('date');
            $table->double('latitude');
            $table->double('longitude');
            $table->foreignId('association_groups_id')->constrained();


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
        Schema::dropIfExists('concours');
    }
}
