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
            $table->decimal('amount', 8,2,2)->default(0);
            $table->text('address');
            $table->enum('status',['pending','processing', 'shipped','delivered','canceled'])->nullable();
            $table->enum('pay_status',['pending','completed'])->nullable();
            $table->text('notes');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE orders AUTO_INCREMENT = 24791;");
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
