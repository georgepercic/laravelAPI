<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crourses', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('cover_id', 36);
            $table->string('video_id', 45);
            $table->string('title', 145);
            $table->string('friendly_url', 145);
            $table->integer('xp');
            $table->text('short_description');
            $table->text('long_description');
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
        Schema::drop('crourses');
    }
}
