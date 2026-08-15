<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Alumni table
        Schema::table('alumni', function (Blueprint $table) {
            if (!Schema::hasColumn('alumni', 'slug')) {
                $table->string('slug')->nullable()->after('name')->unique();
                $table->boolean('is_public')->default(false)->after('photo');
                $table->string('status')->default('draft')->after('is_public');
                $table->timestamp('published_at')->nullable()->after('status');
                
                $table->string('city')->nullable();
                $table->string('education')->nullable();
                $table->string('current_occupation')->nullable();
                $table->string('current_company')->nullable();
                $table->text('bio')->nullable();
            }
            if (Schema::hasColumn('alumni', 'current_status')) {
                $table->dropColumn(['current_status', 'company_name', 'university_name', 'testimonial']);
            }
        });

        // 2. Downloads table
        Schema::table('downloads', function (Blueprint $table) {
            if (!Schema::hasColumn('downloads', 'status')) {
                $table->string('status')->default('draft')->after('file_path');
                $table->timestamp('published_at')->nullable()->after('status');
            }
        });

        // 3. Gallery Items table
        Schema::table('gallery_items', function (Blueprint $table) {
            if (!Schema::hasColumn('gallery_items', 'is_featured')) {
                $table->boolean('is_featured')->default(false)->after('file_path');
                $table->integer('sort_order')->default(0)->after('is_featured');
            }
        });

        // 3b. Gallery Albums table
        Schema::table('gallery_albums', function (Blueprint $table) {
            if (Schema::hasColumn('gallery_albums', 'status')) {
                $table->dropColumn('status');
            }
        });
        Schema::table('gallery_albums', function (Blueprint $table) {
            $table->string('status')->default('draft')->after('thumbnail');
            $table->timestamp('published_at')->nullable()->after('status');
        });

        // 4. Internships table
        Schema::table('internships', function (Blueprint $table) {
            if (!Schema::hasColumn('internships', 'title')) {
                $table->string('title')->nullable()->after('industry_partner_id');
                $table->foreignId('partnership_id')->nullable()->constrained()->nullOnDelete()->after('industry_partner_id');
                $table->text('description')->nullable()->after('status');
            }
            if (Schema::hasColumn('internships', 'student_name')) {
                $table->dropIndex(['student_id']);
                $table->dropColumn(['student_name', 'student_id', 'position']);
            }
            if (Schema::hasColumn('internships', 'status')) {
                $table->dropColumn('status');
            }
        });
        Schema::table('internships', function (Blueprint $table) {
            $table->string('status')->default('planned')->after('end_date');
        });

        // 5. Job Vacancies table
        Schema::table('job_vacancies', function (Blueprint $table) {
            if (Schema::hasColumn('job_vacancies', 'status')) {
                $table->dropColumn('status');
            }
        });
        Schema::table('job_vacancies', function (Blueprint $table) {
            if (!Schema::hasColumn('job_vacancies', 'position')) {
                $table->string('position')->nullable()->after('slug');
                $table->string('location')->nullable()->after('requirements');
                $table->string('work_type')->default('onsite')->after('location');
                $table->string('employment_type')->nullable()->after('work_type');
                $table->decimal('salary_min', 15, 2)->nullable()->after('employment_type');
                $table->decimal('salary_max', 15, 2)->nullable()->after('salary_min');
                $table->string('salary_text')->nullable()->after('salary_max');
                $table->string('application_email')->nullable()->after('salary_text');
                $table->string('application_url')->nullable()->after('application_email');
                $table->dateTime('application_deadline')->nullable()->after('application_url');
                $table->timestamp('published_at')->nullable();
                $table->text('responsibilities')->nullable();
            }
            $table->string('status')->default('draft');
        });
    }

    public function down(): void
    {
    }
};
