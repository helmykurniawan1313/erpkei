<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashflowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashflow', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->date('cashflow_date');
            $table->foreignId('cashflow_category_id');
            $table->foreignId('transaction_category_id');
            $table->foreignId('company_id');
            $table->foreignId('performer_id');
            $table->string('cashflow_name');
            $table->string('tb_number')->nullable();
            $table->string('so_number')->nullable();
            $table->string('po_number')->nullable();
            $table->integer('nominal');
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
        Schema::dropIfExists('cashflow');
    }
}
