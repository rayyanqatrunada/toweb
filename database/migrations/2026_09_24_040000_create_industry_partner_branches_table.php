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
        Schema::create('industry_partner_branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('industry_partner_id')->constrained('industry_partners')->cascadeOnDelete();
            $table->string('name');
            $table->string('branch_code')->nullable();
            $table->string('district');
            $table->string('city')->default('Kabupaten Jepara');
            $table->text('address');
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('google_maps_url', 1000)->nullable();
            $table->string('pic_name')->nullable();
            $table->string('pic_phone')->nullable();
            $table->string('internship_quota')->nullable();
            $table->text('facilities')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('is_main_branch')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['industry_partner_id', 'is_active', 'sort_order'], 'ip_branches_active_sort_idx');
            $table->index('district', 'ip_branches_district_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industry_partner_branches');
    }
};
