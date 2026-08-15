<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
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

    public function down(): void
    {
        Schema::dropIfExists('internship_participants');
    }
};
