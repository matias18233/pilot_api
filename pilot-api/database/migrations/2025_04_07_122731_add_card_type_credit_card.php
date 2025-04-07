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
        Schema::table('credit_cards', function (Blueprint $table) {
            $table->string('card_type');  // Añadimos la columna card_type
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('credit_cards', function (Blueprint $table) {
            $table->dropColumn('card_type');  // Eliminar la columna card_type en caso de rollback
        });
    }
};
