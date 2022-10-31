<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhpMailHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('php_mail_hosts', function (Blueprint $table) {
            $table->id();
            $table->string('host')->nullable();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->string('encription')->nullable();
            $table->integer('port')->nullable();
            $table->string('email_id_name')->nullable();
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
        Schema::dropIfExists('php_mail_hosts');
    }
}
