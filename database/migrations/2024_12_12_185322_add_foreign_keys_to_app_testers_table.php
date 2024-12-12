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
        Schema::table('app_testers', function (Blueprint $table) {
            $table->foreign(['app_id'])->references(['id'])->on('app_showcase')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('app_testers', function (Blueprint $table) {
            $table->dropForeign('app_testers_app_id_foreign');
        });
    }
};
