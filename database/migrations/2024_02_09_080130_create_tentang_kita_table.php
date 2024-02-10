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
        Schema::create('tentang_kita', function (Blueprint $table) {
            $table->string('serial');
            $table->string('nama', 50);
            $table->string('status', 30);
            $table->text('description');
            $table->string('image')->nullable(); // Jika gambar bisa null, gunakan nullable()
            $table->integer('created_by')->nullable(); // Kolom untuk menyimpan ID yang membuat entri
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
        Schema::dropIfExists('tentang_kita');
    }
};
