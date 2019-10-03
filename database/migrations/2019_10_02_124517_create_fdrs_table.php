<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdrs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('no')->nullable();
            $table->string('ledger')->nullable();
            $table->string('type')->nullable();
            $table->string('current_term')->nullable();

            $table->integer('branch_id')->unsigned();
            $table->integer('bank_id')->unsigned();
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fdrs');
    }
}
