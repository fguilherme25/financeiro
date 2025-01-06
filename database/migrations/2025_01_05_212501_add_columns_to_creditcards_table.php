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
        Schema::table('creditcards', function (Blueprint $table) {
            $table->integer('first')->default(1); 
            $table->integer('last')->default(1); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('creditcards', function (Blueprint $table) {
            $table->dropColumn([
                'first',
                'last'
                ]);
        });
    }
};