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
        Schema::table('videos', function (Blueprint $table) {
            //
            $table->string('type')
            ->after('status')
            ->nullable()
            ->comment('Almacena el tipo si es transmision o video');
            $table->string('domain')
            ->after('type')
            ->nullable()
            ->default('localhost')
            ->comment('Colocar el dominio para el chat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            //
            $table->dropColumn('type');
            $table->dropColumn('domain');
        });
    }
};
