<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    // database/migrations/xxxx_xx_xx_create_customers_table.php
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->foreignId('division_id');
            $table->timestamps();
        });
    }



    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
