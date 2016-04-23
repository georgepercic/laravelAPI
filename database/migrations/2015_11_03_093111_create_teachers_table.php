<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('image_id', 36);
            $table->string('full_name', 145);
            $table->string('facebook', 145);
            $table->string('twitter', 145);
            $table->string('linkedin', 145);
            $table->text('bio');
            $table->string('website', 145);
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
        Schema::drop('teachers');
    }
}
