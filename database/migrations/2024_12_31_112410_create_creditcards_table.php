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
        Schema::create('creditcards', function (Blueprint $table) {
            $table->id();
            $table->string('flag', length: 20);
            $table->string('name');
            $table->string('category');
            $table->integer('duedate');
            $table->double('limit')->default(0);;
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creditcards');
    }
};
