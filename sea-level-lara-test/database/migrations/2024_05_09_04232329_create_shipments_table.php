<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id')->nullable();
            $table->unsignedBigInteger('receiver_id')->nullable();
            $table->string('comment')->nullable();
            $table->string('status')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('postal_service')->nullable();
            $table->dateTime('date_created')->nullable();
            $table->dateTime('date_processed')->nullable();
            $table->foreign('sender_id')->references('id')->on('customers');
            $table->foreign('receiver_id')->references('id')->on('customers');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
