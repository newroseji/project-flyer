<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('firstname');
			$table->string('middlename')->nullable();
			$table->string('lastname');
			$table->string('username')->unique();

            $table->string('email')->unique();
            $table->string('password',60);

			$table->string('address1');
			$table->string('address2');
			$table->string('city');
			$table->string('state',2);
			$table->string('zip',5);
			$table->string('country');

			$table->boolean('verified')->default(false);
			$table->string('token')->nullable();
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
        Schema::drop('users');
    }
}
