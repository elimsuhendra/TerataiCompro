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
        Schema::table('visi_misi', function (Blueprint $table) {
            $table->timestamps(); // This will automatically add created_at and updated_at columns.
            $table->integer('created_by')->nullable()->after('updated_at');
            $table->softDeletes(); // This will add a "deleted_at" column to the table

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visi_misi', function (Blueprint $table) {
            //
        });
    }
};
