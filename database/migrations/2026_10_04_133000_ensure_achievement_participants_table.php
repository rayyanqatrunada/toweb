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
        if (!Schema::hasTable('achievement_participants')) {
            Schema::create('achievement_participants', function (Blueprint $table) {
                $table->id();
                $table->foreignId('achievement_id')->constrained()->cascadeOnDelete();
                $table->string('student_name');
                $table->string('student_id', 50)->nullable()->index();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('internship_participants')) {
            Schema::create('internship_participants', function (Blueprint $table) {
                $table->id();
                $table->foreignId('internship_id')->constrained()->cascadeOnDelete();
                $table->string('student_name');
                $table->string('student_id', 50)->index();
                $table->string('role')->nullable();
                $table->enum('status', ['active', 'completed', 'dropped'])->default('active');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Keep tables to prevent accidental data loss in production
    }
};
