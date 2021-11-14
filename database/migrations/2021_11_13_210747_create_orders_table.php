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
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained();
            $table->string('name', 200)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('address')->nullable();
            $table->string('phone', 20)->nullable();
            $table->enum('status', [
                'new',
                'pending',
                'complete',
                'canceled',
                'delivering'
            ]);
            $table->text('comment')->nullable();
            $table->string('delivery_time', 150)->nullable();
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
