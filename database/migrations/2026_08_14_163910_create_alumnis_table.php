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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('student_id', 50)->unique()->index();
            $table->integer('graduation_year')->index();
            $table->enum('current_status', ['working', 'studying', 'entrepreneur', 'looking_for_job'])->default('looking_for_job');
            $table->string('company_name')->nullable();
            $table->string('university_name')->nullable();
            $table->text('testimonial')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
