<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keys', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('key', 40);
            $table->integer('level');
            $table->tinyInteger('ignore_limits')->default(0);
            $table->tinyInteger('is_private_key')->default(0);
            $table->text('ip_addresses')->nullable($value = true)->default(null);
            $table->integer('date_created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keys');
    }
}
