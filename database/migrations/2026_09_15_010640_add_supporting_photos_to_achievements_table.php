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
        if (!Schema::hasColumn('achievements', 'supporting_photos')) {
            Schema::table('achievements', function (Blueprint $table) {
                $table->json('supporting_photos')->nullable()->after('photo');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('achievements', 'supporting_photos')) {
            Schema::table('achievements', function (Blueprint $table) {
                $table->dropColumn('supporting_photos');
            });
        }
    }
};
