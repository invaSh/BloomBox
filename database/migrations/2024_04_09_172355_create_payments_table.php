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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('transaction_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', ['card', 'cash']);
            $table->enum('status', ['pending', 'completed', 'failed','refunded']);
            $table->unsignedBigInteger('card_id')->nullable();
            $table->unsignedBigInteger('billing_id')->nullable();
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            $table->foreign('billing_id')->references('id')->on('billings')->onDelete('cascade');
            $table->bigInteger('refunder')->nullable();
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
        DB::statement("ALTER TABLE payments AUTO_INCREMENT = 23691;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
