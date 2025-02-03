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
        Schema::table('commandes', function (Blueprint $table) {
            // $table->dropColumn('decorator_id');
            // $table->dropForeign(['decorator_id']);
            $table->unsignedBigInteger('panel_id');
            $table->foreign('panel_id')->references('id')->on('panels')->onDelete('cascade');
            $table->float('total_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropColumn('panel_id');
            $table->dropForeign(['panel_id']);
            $table->dropColumn('total_price');
        });
    }
};
