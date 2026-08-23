<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add composite indexes for frequently-used query patterns.
     * 
     * Each scope like published(), public() queries on multiple columns
     * together — composite indexes dramatically speed these up vs single indexes.
     */
    public function up(): void
    {
        // posts: scope published() queries (status, published_at) together
        Schema::table('posts', function (Blueprint $table) {
            $table->index(['status', 'published_at'], 'posts_status_published_at_idx');
            $table->index(['category_id', 'status', 'published_at'], 'posts_category_status_published_at_idx');
        });

        // gallery_albums: scope published() queries (status, published_at) together
        Schema::table('gallery_albums', function (Blueprint $table) {
            $table->index(['status', 'published_at'], 'gallery_albums_status_published_at_idx');
        });

        // alumni: scope public() = published() + is_public → 3 columns
        Schema::table('alumni', function (Blueprint $table) {
            $table->index(['status', 'is_public', 'published_at'], 'alumni_status_public_published_at_idx');
        });

        // job_vacancies: scope published() + deadline filter
        Schema::table('job_vacancies', function (Blueprint $table) {
            $table->index(['status', 'published_at', 'deadline'], 'job_vacancies_status_published_at_deadline_idx');
        });

        // achievements: scope published() queries (status, published_at) together
        Schema::table('achievements', function (Blueprint $table) {
            $table->index(['status', 'published_at'], 'achievements_status_published_at_idx');
        });

        // industry_partners: scope published() queries (status, published_at) together
        Schema::table('industry_partners', function (Blueprint $table) {
            $table->index(['status', 'published_at'], 'industry_partners_status_published_at_idx');
        });

        // downloads: scope public() = published() + is_public
        Schema::table('downloads', function (Blueprint $table) {
            $table->index(['status', 'is_public', 'published_at'], 'downloads_status_public_published_at_idx');
        });

        // announcements: scope active() uses is_active
        Schema::table('announcements', function (Blueprint $table) {
            $table->index(['is_active', 'created_at'], 'announcements_is_active_created_at_idx');
        });

        // internships: scope published() uses status only (IN clause)
        Schema::table('internships', function (Blueprint $table) {
            $table->index('industry_partner_id', 'internships_industry_partner_id_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('internships', function (Blueprint $table) {
            $table->dropIndex('internships_industry_partner_id_idx');
        });

        Schema::table('announcements', function (Blueprint $table) {
            $table->dropIndex('announcements_is_active_created_at_idx');
        });

        Schema::table('downloads', function (Blueprint $table) {
            $table->dropIndex('downloads_status_public_published_at_idx');
        });

        Schema::table('industry_partners', function (Blueprint $table) {
            $table->dropIndex('industry_partners_status_published_at_idx');
        });

        Schema::table('achievements', function (Blueprint $table) {
            $table->dropIndex('achievements_status_published_at_idx');
        });

        Schema::table('job_vacancies', function (Blueprint $table) {
            $table->dropIndex('job_vacancies_status_published_at_deadline_idx');
        });

        Schema::table('alumni', function (Blueprint $table) {
            $table->dropIndex('alumni_status_public_published_at_idx');
        });

        Schema::table('gallery_albums', function (Blueprint $table) {
            $table->dropIndex('gallery_albums_status_published_at_idx');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex('posts_category_status_published_at_idx');
            $table->dropIndex('posts_status_published_at_idx');
        });
    }
};
