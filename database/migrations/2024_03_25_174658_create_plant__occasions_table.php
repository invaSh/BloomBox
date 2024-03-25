<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('plant__occasions', function (Blueprint $table) {
            $table->unsignedBigInteger('occasion_id');
            $table->unsignedBigInteger('plant_id');

            $table->foreign('occasion_id')
                    ->references('id')
                    ->on('occasions')
                    ->onDelete('cascade');  
            
            $table->foreign('plant_id')
                    ->references('id')
                    ->on('plants')
                    ->onDelete('cascade'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('plant__occasions');
    }
};
