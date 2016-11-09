<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_company', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->string('name');
            $table->string('addr');
            $table->string('manager');
            $table->string('pay_fare');
            $table->string('new_wealth_vote');
            $table->string('fof');
            $table->string('remark');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('type_id')
                ->references('id')->on('t_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
