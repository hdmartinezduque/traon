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
        //
        Schema::table('users', function (Blueprint $table) {
            $table->string('type_user')->nullable()->change();
            $table->integer('number_cell')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('region')->nullable()->change();
            $table->string('token')->nullable()->change();
            $table->string('telegram_user')->nullable()->change();
            $table->string('archived')->nullable()->change()->default('active');
            $table->string('ip_decimal')->nullable()->change();
            $table->timestamp('last_sign_in_at')->nullable()->change();
            $table->renameColumn('state', 'status')->default('active');
            
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            //
            $table->renameColumn('status', 'state')->default('active');
        });
    }
};
