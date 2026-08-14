<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('industry_partners', function (Blueprint $table) {
            $table->string('industry_type')->nullable()->after('slug');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft')->after('logo');
            $table->timestamp('published_at')->nullable()->after('status');
            $table->string('meta_title')->nullable()->after('published_at');
            $table->text('meta_description')->nullable()->after('meta_title');
        });
    }

    public function down(): void
    {
        Schema::table('industry_partners', function (Blueprint $table) {
            $table->dropColumn([
                'industry_type', 'status', 'published_at', 'meta_title', 'meta_description'
            ]);
        });
    }
};
