<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->foreignId('category_id')
                  ->constrained()->after('id');
            $table->string('header')->after('category_id');
            $table->string('image', 30)->nullable()->after('category_id');
            $table->integer('pos')->nullable()->after('image');
            $table->boolean('status')->default(true)->after('pos');
            $table->text('content_raw')->nullable()->after('status');
            $table->text('content')->nullable()->after('content_raw');
            $table->integer('price')->nullable()->after('content');
            $table->integer('weight')->nullable()->after('price');
            $table->float('proteins', 8, 2)->nullable()->after('weight');
            $table->float('fats', 8, 2)->nullable()->after('proteins');
            $table->float('carbo', 8, 2)->nullable()->after('fats');
            $table->integer('price_alt')->nullable()->after('carbo');
            $table->integer('weight_alt')->nullable()->after('price_alt');
            $table->float('proteins_alt', 8, 2)->nullable()->after('weight_alt');
            $table->float('fats_alt', 8, 2)->nullable()->after('proteins_alt');
            $table->float('carbo_alt', 8, 2)->nullable()->after('fats_alt');
            $table->float('energy', 8, 2)->nullable()->after('carbo_alt');
            $table->dateTime('deleted_at', $precision = 0)->nullable()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
