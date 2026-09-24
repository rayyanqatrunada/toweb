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
        Schema::table('facilities', function (Blueprint $table) {
            $table->string('category')->default('bengkel')->after('slug')->index();
            $table->text('specifications')->nullable()->after('description');
            $table->string('capacity')->nullable()->after('quantity');
            $table->string('safety_standards')->nullable()->after('capacity');
            $table->integer('sort_order')->default(0)->after('condition')->index();
            $table->boolean('is_featured')->default(true)->after('sort_order')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->dropColumn([
                'category',
                'specifications',
                'capacity',
                'safety_standards',
                'sort_order',
                'is_featured'
            ]);
        });
    }
};
