<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned()->default(0);
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('country_id')->unsigned()->default(0);
            $table->foreign('country_id')->references('id')->on('location_countries')->onDelete('cascade');
            $table->integer('city_id')->unsigned()->default(0);
            $table->foreign('city_id')->references('id')->on('location_cities')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->integer('phone')->nullable();
            $table->string('contact_person')->nullable();
            $table->text('notes')->nullable();
            $table->datetime('posted_at');
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
        Schema::drop('companies');
    }
}
