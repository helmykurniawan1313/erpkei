<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/xxxx_xx_xx_create_customers_table.php

    // database/migrations/xxxx_xx_xx_create_orders_table.php
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->date('order_date');
            $table->string('so_number')->nullable();
            $table->string('company_id')->nullable();
            $table->decimal('total_amount', 10, 2)->default(0);
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
        Schema::dropIfExists('orders');
    }
}
