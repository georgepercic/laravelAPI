<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApiLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('user_id', 36)->nullable()->index();
            $table->string('controller', 45);
            $table->string('action', 45);
            $table->string('ip', 40)->index();
            $table->smallInteger('response_code')->unsigned()->index();
            $table->string('request_path', 255);
            $table->string('request_params', 255);
            $table->string('request_method', 10)->index();
            $table->text('request_headers');
            $table->text('dump');
            $table->timestamp('created_at')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('api_logs');
    }
}
