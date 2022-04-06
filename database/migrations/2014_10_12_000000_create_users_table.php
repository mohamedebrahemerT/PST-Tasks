<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->integer()('phonenumber');
            $table->enum('type',['super admin','admin','user'])->default('user');
          $table->string('jobtitle_ar');
            $table->string('jobtitle_en');
            $table->string('address');
            $table->string('photo');
            $table->string('password');
            $table->enum('status',['active','unactive'])->default('active');
            $table->string('api_token');
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
        Schema::dropIfExists('users');
    }
}
