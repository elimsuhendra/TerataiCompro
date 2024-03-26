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
        Schema::create('option_map', function (Blueprint $table) {
            $table->string('serial');
            $table->string('key');
            $table->string('value');
            $table->string('kategori')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('produk');
    }
};
