<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPageFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('header')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('image', 30)->nullable();
            $table->integer('pos')->nullable();
            $table->boolean('status')->default(true);
            $table->text('content_raw')->nullable();
            $table->text('content')->nullable();
            $table->dateTime('deleted_at', $precision = 0)->nullable();
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
