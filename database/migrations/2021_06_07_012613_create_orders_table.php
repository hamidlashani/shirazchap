<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('category_type');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('product');
            $table->bigInteger('count');
            $table->text('files');
            $table->text('optins');
            $table->text('description');
            $table->integer('price');
            $table->integer('pay_id');
            $table->date('pay_date');
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
        Schema::dropIfExists('orders');
    }
}
