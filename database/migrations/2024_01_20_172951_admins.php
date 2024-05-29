<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
Schema::create('admins', function (Blueprint $table) {
$table->bigIncrements('id');
$table->string('name');
$table->string('email');
$table->string('password');
$table->timestamps('created_at');
$table->timestamps('updated_at');
$table->boolean('is_publish')->default(0);
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
        Schema::drop('admins');
    }
}
