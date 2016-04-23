<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('user_id', 36);
            $table->char('author_id', 36);
            $table->char('cover_id', 36);
            $table->string('title', 145);
            $table->text('body');
            $table->text('summary');
            $table->string('friendly_url', 145);
            $table->integer('comment_count');
            $table->timestamp('published_at');
            $table->timestamps();
        });

        Schema::table('articles', function (Blueprint $table) {
            //define table indexes
            $table->index('friendly_url');
            $table->index('created_at');
            $table->index('cover_id');
            $table->index('user_id');
            $table->index('author_id');
            //define foreign keys
            $table->foreign('cover_id')->references('file_name')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
