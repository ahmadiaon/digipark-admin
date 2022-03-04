<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_registers', function (Blueprint $table) {
            // primary
            $table->bigIncrements('id');
            $table->string('uuid')->unique();
            $table->string('community_uuid')->nullable();
            $table->string('user_uuid')->nullable();

            // secondary
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->integer('age')->nullable();
            $table->string('phone_number')->nullable();

            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();

            $table->tinyInteger('check1')->nullable();
            $table->tinyInteger('check2')->nullable();
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
        Schema::dropIfExists('community_registers');
    }
}
