<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_services', function (Blueprint $table) {
            // primary
            $table->bigIncrements('id');
            $table->string('uuid')->unique();

            // secondary
            $table->string('name')->nullable();
            $table->text('logo_path')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->text('description')->nullable();
            $table->text('image_path')->nullable();
            $table->text('location')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->tinyInteger('status')->nullable();

            // timestamp
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
        Schema::dropIfExists('financial_services');
    }
}
