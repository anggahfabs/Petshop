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
        Schema::table('contacts', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn(['name', 'email', 'phone', 'message', 'is_read']);

            // Add new columns for Contact Info
            $table->string('title')->nullable(); // e.g. "Our Location"
            $table->text('description')->nullable(); // e.g. "123 Street..."
            $table->string('logo')->nullable(); // e.g. path/to/icon.png
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
        });
    }
};
