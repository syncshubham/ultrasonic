<?php

// database/migrations/2024_08_09_000000_create_user_orders_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->json('product_details'); // JSON column to store product details
            $table->decimal('final_price', 10, 2);
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('payment_id');
            $table->string('order_status')->default('placed_1');
            $table->string('order_id')->unique();
            $table->string('payment_status')->default('pending');
            $table->timestamps();

            // Define foreign key constraints (if necessary)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('user_addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_orders');
    }
}

