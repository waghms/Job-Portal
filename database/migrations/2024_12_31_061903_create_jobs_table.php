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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_id')->unique();
            $table->string('postname');
            $table->string('company_name');
            $table->string('location');
            $table->string('salary');
            $table->string('experience');
            $table->enum('job_type', ['Full-time', 'Part-time']);
            $table->enum('category', [
                'Marketing',
                'Customer Service',
                'Human Resource',
                'Project Management',
                'Business Development',
                'Sales & Communication',
                'Design & Creative',
                'Others' 
            ]);
            $table->date('last_date');
            $table->text('skills');
            $table->text('educational_requirements');
            $table->text('responsibility');
            $table->string('vacancy')->default(0);
            $table->string('logo')->nullable(); 
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
