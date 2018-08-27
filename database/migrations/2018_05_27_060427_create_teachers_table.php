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
            $table->increments('id');
            $table->string('nip')->unique();
            $table->string('username')->unique();
            $table->string('birthplace');
            $table->date('birthdate');
            $table->integer('gender_id')->unsigned();
            $table->integer('religion_id')->unsigned();
            $table->string('phone')->unique();
            $table->string('name');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
