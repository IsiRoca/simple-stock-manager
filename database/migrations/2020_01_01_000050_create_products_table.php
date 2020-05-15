<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned()->default(0);
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('product_type_id')->unsigned()->default(0);
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
            $table->integer('company_id')->unsigned()->default(0);
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->decimal('price')->default(0);
            $table->integer('quantity')->default(0);
            $table->string('sku')->default('sku-');
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
        Schema::drop('products');
    }
}
