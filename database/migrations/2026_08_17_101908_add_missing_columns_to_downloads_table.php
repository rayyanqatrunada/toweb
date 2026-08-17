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
        Schema::table('downloads', function (Blueprint $table) {
            if (!Schema::hasColumn('downloads', 'download_count')) {
                $table->unsignedBigInteger('download_count')->default(0)->after('is_public');
                $table->string('file_name')->nullable()->after('file_path');
                $table->string('file_type')->nullable()->after('file_name');
                $table->unsignedBigInteger('file_size')->nullable()->after('file_type');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('downloads', function (Blueprint $table) {
            $table->dropColumn(['download_count', 'file_name', 'file_type', 'file_size']);
        });
    }
};
