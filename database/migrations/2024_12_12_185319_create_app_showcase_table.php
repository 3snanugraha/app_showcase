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
        Schema::create('app_showcase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('app_name');
            $table->text('app_description');
            $table->string('app_banner');
            $table->json('app_screenshots');
            $table->string('app_version');
            $table->string('app_package_name')->unique();
            $table->string('app_download_link');
            $table->string('internal_test_link')->nullable();
            $table->string('app_min_android_version');
            $table->decimal('app_size')->comment('Size in MB');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_showcase');
    }
};
