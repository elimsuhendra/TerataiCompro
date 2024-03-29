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
        Schema::create('produk', function (Blueprint $table) {
            $table->string('serial');
            $table->string('nama');
            $table->string('serial_kategori');
            $table->text('deskripsi')->nullable();
            $table->timestamps(); // This will automatically add created_at and updated_at columns.
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
