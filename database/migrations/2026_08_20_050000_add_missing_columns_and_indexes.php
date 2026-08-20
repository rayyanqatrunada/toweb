<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Fix missing columns and add performance indexes.
     * 
     * Addresses:
     * - GalleryAlbum fillable/schema mismatch (event_date, location, meta_title, meta_description, sort_order)
     * - GalleryItem fillable/schema mismatch (title, alt_text)
     * - Download fillable/schema mismatch (meta_title, meta_description, sort_order)
     * - Alumni fillable/schema mismatch (achievements, meta_title, meta_description)
     * - Missing performance indexes on status/published_at columns
     * - Missing composite unique on post_tag pivot
     */
    public function up(): void
    {
        // 1. Gallery Albums — add missing columns
        Schema::table('gallery_albums', function (Blueprint $table) {
            if (!Schema::hasColumn('gallery_albums', 'event_date')) {
                $table->date('event_date')->nullable()->after('description');
            }
            if (!Schema::hasColumn('gallery_albums', 'location')) {
                $table->string('location')->nullable()->after('event_date');
            }
            if (!Schema::hasColumn('gallery_albums', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('published_at');
            }
            if (!Schema::hasColumn('gallery_albums', 'meta_title')) {
                $table->string('meta_title')->nullable()->after('sort_order');
            }
            if (!Schema::hasColumn('gallery_albums', 'meta_description')) {
                $table->text('meta_description')->nullable()->after('meta_title');
            }
        });

        // 2. Gallery Items — add missing columns
        Schema::table('gallery_items', function (Blueprint $table) {
            if (!Schema::hasColumn('gallery_items', 'title')) {
                $table->string('title')->nullable()->after('file_path');
            }
            if (!Schema::hasColumn('gallery_items', 'alt_text')) {
                $table->string('alt_text')->nullable()->after('title');
            }
        });

        // 3. Downloads — add missing columns
        Schema::table('downloads', function (Blueprint $table) {
            if (!Schema::hasColumn('downloads', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('download_count');
            }
            if (!Schema::hasColumn('downloads', 'meta_title')) {
                $table->string('meta_title')->nullable()->after('published_at');
            }
            if (!Schema::hasColumn('downloads', 'meta_description')) {
                $table->text('meta_description')->nullable()->after('meta_title');
            }
        });

        // 4. Alumni — add missing columns
        Schema::table('alumni', function (Blueprint $table) {
            if (!Schema::hasColumn('alumni', 'achievements')) {
                $table->text('achievements')->nullable()->after('bio');
            }
            if (!Schema::hasColumn('alumni', 'meta_title')) {
                $table->string('meta_title')->nullable()->after('published_at');
            }
            if (!Schema::hasColumn('alumni', 'meta_description')) {
                $table->text('meta_description')->nullable()->after('meta_title');
            }
        });

        // 5. Performance indexes on frequently queried columns
        Schema::table('posts', function (Blueprint $table) {
            $table->index('status');
            $table->index('published_at');
        });

        Schema::table('achievements', function (Blueprint $table) {
            $table->index('status');
            $table->index('level');
        });

        Schema::table('gallery_albums', function (Blueprint $table) {
            $table->index('status');
        });

        Schema::table('downloads', function (Blueprint $table) {
            $table->index('status');
        });

        Schema::table('announcements', function (Blueprint $table) {
            $table->index('is_active');
        });

        Schema::table('job_vacancies', function (Blueprint $table) {
            $table->index('status');
        });

        Schema::table('industry_partners', function (Blueprint $table) {
            $table->index('status');
        });

        // 6. Post-Tag pivot — add composite unique to prevent duplicates
        Schema::table('post_tag', function (Blueprint $table) {
            $table->unique(['post_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove post_tag composite unique
        Schema::table('post_tag', function (Blueprint $table) {
            $table->dropUnique(['post_id', 'tag_id']);
        });

        // Remove indexes
        Schema::table('industry_partners', function (Blueprint $table) {
            $table->dropIndex(['status']);
        });

        Schema::table('job_vacancies', function (Blueprint $table) {
            $table->dropIndex(['status']);
        });

        Schema::table('announcements', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
        });

        Schema::table('downloads', function (Blueprint $table) {
            $table->dropIndex(['status']);
        });

        Schema::table('gallery_albums', function (Blueprint $table) {
            $table->dropIndex(['status']);
        });

        Schema::table('achievements', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['level']);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['published_at']);
        });

        // Remove alumni columns
        Schema::table('alumni', function (Blueprint $table) {
            $table->dropColumn(['achievements', 'meta_title', 'meta_description']);
        });

        // Remove download columns
        Schema::table('downloads', function (Blueprint $table) {
            $table->dropColumn(['sort_order', 'meta_title', 'meta_description']);
        });

        // Remove gallery_items columns
        Schema::table('gallery_items', function (Blueprint $table) {
            $table->dropColumn(['title', 'alt_text']);
        });

        // Remove gallery_albums columns
        Schema::table('gallery_albums', function (Blueprint $table) {
            $table->dropColumn(['event_date', 'location', 'sort_order', 'meta_title', 'meta_description']);
        });
    }
};
