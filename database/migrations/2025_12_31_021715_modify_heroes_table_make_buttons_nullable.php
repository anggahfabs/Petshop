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
        Schema::table('heroes', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->change();
            $table->string('button_text')->nullable()->change();
            $table->string('button_link')->nullable()->change();
            $table->string('image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('heroes', function (Blueprint $table) {
            $table->string('subtitle')->nullable(false)->change();
            $table->string('button_text')->nullable(false)->change();
            $table->string('button_link')->nullable(false)->change();
            $table->string('image')->nullable(false)->change();
        });
    }
};
