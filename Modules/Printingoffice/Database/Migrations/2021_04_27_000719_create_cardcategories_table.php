<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatecardcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('parent');
            $table->timestamps();
        });


        Schema::create('cardcategory_cardproduct' , function(Blueprint $table) {
            $table->unsignedBigInteger('cardcategory_id');
            $table->foreign('cardcategory_id')->references('id')->on('cardcategories')->onDelete('cascade');
            $table->unsignedBigInteger('cardproduct_id');
            $table->foreign('cardproduct_id')->references('id')->on('carsdproduct')->onDelete('cascade');
            $table->primary(['cardcategory_id' , 'cardproduct_id']);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cardcategory_cardproduct');
        Schema::dropIfExists('cardcategories');
    }
}
