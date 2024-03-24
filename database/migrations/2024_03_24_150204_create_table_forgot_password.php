<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forgot_password', function (Blueprint $table) {
            $table->string('serial', 50);
            $table->string('token', 50);
            $table->integer('id_user');
            $table->string('_status', 20);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('forgot_password');
    }
};
