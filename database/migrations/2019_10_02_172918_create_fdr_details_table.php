<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdrDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdr_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fdr_id')->unsigned(); 

            $table->date('issue_date')->nullable();
            $table->decimal('principal_amount', 12, 2)->nullable();

            $table->decimal('interest_rate', 5, 2)->nullable();
            $table->decimal('interest_on_maturity', 12, 2)->nullable();
            $table->decimal('income_tax', 12, 2)->nullable();
            $table->decimal('service_charge', 12, 2)->nullable();
            $table->decimal('excise_duty', 12, 2)->nullable();
            $table->decimal('bank_charge', 12, 2)->nullable();

            $table->decimal('balance_on_maturity', 12, 2)->nullable();
            $table->date('maturity_date')->nullable();

            $table->integer('user_id')->unsigned(); 
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fdr_id')->references('id')->on('fdrs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fdr_details');
    }
}
