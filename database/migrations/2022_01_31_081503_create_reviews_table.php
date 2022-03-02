<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            // primary
            $table->bigIncrements('id');
            $table->string('uuid')->unique();
            $table->string('business_category_uuid')->nullable();
            $table->string('user_uuid')->nullable();


            $table->text('image_path')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('value')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
