<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->char('user_id', 36);
            $table->string('email', 100)->unique();
            $table->tinyInteger('type')->default(1);
            $table->string('token');
            $table->timestamp('created_at')->index();
            $table->timestamp('expire_at');
            $table->timestamp('used_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_tokens');
    }
}
