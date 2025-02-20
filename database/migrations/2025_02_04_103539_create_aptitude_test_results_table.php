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
        Schema::create('aptitude_test_results', function (Blueprint $table) {
            $table->id();
            
            // Foreign key referencing the users table for user_id
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Foreign key referencing the applications table for job_id
            // Assuming the 'applications' table has 'job_id' as a column
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
            
            // Other columns
            $table->timestamp('completed_at'); // When the test was completed
            $table->integer('total_marks'); // Total marks obtained
            $table->integer('correct_answers'); // Number of correct answers
            $table->enum('status', ['completed', 'incomplete']); // Status of the test
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aptitude_test_results');
    }
};
