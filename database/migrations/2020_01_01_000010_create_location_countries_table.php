<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('iso_alpha_2', 3);
            $table->string('iso_alpha_3', 4);
            $table->smallInteger('iso_numeric')->nullable();
            $table->string('international_phone', 150)->nullable();
            $table->boolean('visible')->default(FALSE);
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
        Schema::drop('location_countries');
    }
}
