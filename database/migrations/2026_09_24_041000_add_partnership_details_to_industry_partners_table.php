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
        Schema::table('industry_partners', function (Blueprint $table) {
            $table->string('mou_number')->nullable()->after('website');
            $table->date('mou_start_date')->nullable()->after('mou_number');
            $table->date('mou_end_date')->nullable()->after('mou_start_date');
            $table->string('partnership_level')->nullable()->default('Kelas Industri Binaan Grade A+')->after('mou_end_date');
            $table->string('headquarters_city')->nullable()->after('partnership_level');
            $table->text('curriculum_sync_info')->nullable()->after('headquarters_city');
            $table->string('banner_image')->nullable()->after('logo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('industry_partners', function (Blueprint $table) {
            $table->dropColumn([
                'mou_number',
                'mou_start_date',
                'mou_end_date',
                'partnership_level',
                'headquarters_city',
                'curriculum_sync_info',
                'banner_image',
            ]);
        });
    }
};
