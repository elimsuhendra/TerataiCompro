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
        Schema::create('kontak_kami', function (Blueprint $table) {
            $table->string('serial');
            $table->string('nama');
            $table->string('email');
            $table->string('subject');
            $table->text('pesan');
            $table->timestamps(); // This will automatically add created_at and updated_at columns.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontak_kami');
    }
};
