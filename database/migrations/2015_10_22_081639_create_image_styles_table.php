<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_styles', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('name', 45);
            $table->string('folder', 145);
            $table->string('action', 45);
            $table->smallInteger('width')->nullable();
            $table->smallInteger('height')->nullable();
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
        Schema::drop('image_styles');
    }
}
