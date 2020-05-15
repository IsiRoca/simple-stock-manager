<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned()->default(0);
            $table->foreign('country_id')->references('id')->on('location_countries')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
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
        Schema::drop('location_cities');
    }
}
