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
            $table->integer('company_type_id')->unsigned();
            $table->string('company_name');
            $table->string('startup_date');
            $table->string('industry_no');
            $table->string('office_addr');
            $table->string('estate_scale')->nullable();
            $table->string('profess_count')->nullable();
            $table->string('private_count')->nullable();
            $table->string('product')->nullable();
            $table->string('fellow')->nullable();
            $table->string('personal_info')->nullable();
            $table->string('product_type')->nullable();
            $table->string('invest_strategy')->nullable();
            $table->string('manager');
            $table->string('pay_fee')->nullable();
            $table->string('new_wealth_vote')->nullable();
            $table->string('fof')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('company_type_id')
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
