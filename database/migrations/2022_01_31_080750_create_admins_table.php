<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *

     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            // primary
            $table->bigIncrements('id');
            $table->string('uuid')->unique()->nullable();

            // secondary
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->text('password')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->nullable();

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
        Schema::dropIfExists('admins');
    }
}
