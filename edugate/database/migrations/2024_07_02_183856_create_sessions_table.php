<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();    // Primary key for session identifier
            $table->text('payload');                    // Serialized session data
            $table->integer('last_activity');   // Timestamp of last activity time
            $table->unsignedBigInteger('user_id')->nullable();  // Nullable user_id column
            $table->string('ip_address')->nullable();   // Nullable IP address
            $table->text('user_agent')->nullable(); // Timestamp of last activity time
            $table->timestamps();              // Laravel's standard 'created_at' and 'updated_at' columns

            // Index for faster session lookup based on last_activity
            $table->index('last_activity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
