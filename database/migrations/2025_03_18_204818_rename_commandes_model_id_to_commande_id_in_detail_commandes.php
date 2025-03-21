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
        Schema::table('detail_commandes', function (Blueprint $table) {
            $table->renameColumn('commandes_model_id', 'commande_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_commandes', function (Blueprint $table) {
            $table->renameColumn('commande_id', 'commandes_model_id');
        });
    }
};