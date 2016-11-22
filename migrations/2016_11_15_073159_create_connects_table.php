<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_connect', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('name', 60);
            $table->string('duty');
            $table->string('covers');
            $table->string('landline_tel');
            $table->integer('mobile');
            $table->string('email', 60);
            $table->string('focus');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connects');
    }
}
