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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('plan_id');    

            $table->timestamp('subscription_date');
            $table->string('frozen');
            $table->string('status');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->string('archived');
            $table->timestamps();
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('plan_id')
                ->references('id')
                ->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
