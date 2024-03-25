<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product__occasions', function (Blueprint $table) {
            $table->unsignedBigInteger('occasion_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('occasion_id')
                    ->references('id')
                    ->on('occasions')
                    ->onDelete('cascade');  
            
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade');  

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product__occasions');
    }
};
