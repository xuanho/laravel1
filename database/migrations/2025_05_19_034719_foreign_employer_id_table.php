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
        Schema::table('job_listing', function (Blueprint $table) {
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listing', function (Blueprint $table) {
            $table->dropForeign(['employer_id']);
        });
    }
};
