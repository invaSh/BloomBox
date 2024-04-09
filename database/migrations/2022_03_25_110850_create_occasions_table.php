<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('occasions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE occasions AUTO_INCREMENT = 44791;");
    }

    public function down()
    {
        Schema::dropIfExists('occasions');
    }
};
