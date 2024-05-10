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
        Schema::table('offers', function (Blueprint $table) {
            $table->date('offer_stat_date')->nullable();
            $table->date('offer_end_date')->nullable();
            $table->string('min_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn('offer_stat_date');
            $table->dropColumn('offer_end_date');
            $table->dropColumn('min_amount');
        });
    }
};
