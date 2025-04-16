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
    Schema::dropIfExists('semester_master');
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('semester_master', function (Blueprint $table) {
            //
        });
    }
};
