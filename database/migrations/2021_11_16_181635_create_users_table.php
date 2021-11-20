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
            $table->id();
            $table->string("name",50);
            $table->string("last_name",100);
            $table->string("email",200);
            $table->string("selfie")->nullable();
            $table->string("description")->nullable();
            $table->string('password');
            //relacionamos usuario a rol, por defecto será 2->regular
            $table->unsignedBigInteger("rol_id")->default(2);
            $table->foreign("rol_id")->references("id")->on("rols")->onUpdate('cascade')->onDelete('cascade');
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
