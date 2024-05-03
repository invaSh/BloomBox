<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['pending','processing', 'shipped','delivered','canceled'])->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->foreign('payment_id')->references('transaction_id')->on('payments')->onDelete('set null');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE orders AUTO_INCREMENT = 24791;");
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
