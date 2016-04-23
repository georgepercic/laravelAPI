<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta', function (Blueprint $table) {
            $table->char('entity_id', 36)->primary();
            $table->char('og_image_id', 36);
            $table->string('og_title', 145);
            $table->string('og_description', 160);
            $table->string('title', 145);
            $table->string('description', 160);
            $table->timestamps();
        });

        Schema::table('meta', function (Blueprint $table) {
            //define table indexes
            $table->index('og_image_id');
            //define foreign keys
            $table->foreign('og_image_id')->references('file_name')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meta');
    }
}
