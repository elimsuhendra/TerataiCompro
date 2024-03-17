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
        Schema::create('table_mail_setting', function (Blueprint $table) {
            $table->char('serial', 36)->primary();
            $table->string('host', 64);
            $table->string('port', 8);
            $table->string('username', 100);
            $table->string('password', 255);
            $table->string('email', 100); // email
            $table->string('_status', 8);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('table_mail_setting');
    }
};
