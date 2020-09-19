<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comments', function (Blueprint $table) {
          $table->bigIncrements('cmt_id');
          $table->string('comment');
          $table->unsignedBigInteger('food_id');
          $table->string('customer_name');
         });

          Schema::table('comments',function ($table){
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('customer_name')->references('username')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
