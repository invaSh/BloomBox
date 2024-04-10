<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->text('bio')->nullable();
            $table->string('imgUrl')->nullable();
            $table->enum('role', ['admin','user','employee']);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE users AUTO_INCREMENT = 94791;");
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
