<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->char('file_name', 36)->primary();
            $table->char('extension', 4);
            $table->char('entity_id', 36);
            $table->string('original_file_name', 145);
            $table->string('caption', 45);
            $table->string('title', 45);
            $table->timestamps();
        });

        Schema::table('images', function (Blueprint $table) {
            $table->index('entity_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('images');
    }
}
