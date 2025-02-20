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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_id');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->date('dob');
            $table->string('email');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('jobroll');
            $table->string('address');
            $table->string('country');
            $table->string('state');
            $table->string('district');
            $table->string('pincode');
            $table->string('contact_no');
            $table->string('pancard_no')->nullable(); 
            $table->string('ssc_highschool_name')->nullable();
            $table->decimal('ssc_percentage', 5, 2)->nullable();
            $table->year('ssc_passout_year')->nullable();
            $table->string('hsc_college_name')->nullable();
            $table->decimal('hsc_percentage', 5, 2)->nullable();
            $table->year('hsc_passout_year')->nullable();
            $table->string('graduation_college_name')->nullable();
            $table->decimal('graduation_percentage', 5, 2)->nullable();
            $table->year('graduation_passout_year')->nullable();
            $table->string('skills')->nullable();
            $table->string('company_name')->nullable();
            $table->string('work_experience')->nullable();
            $table->string('location')->nullable();
            $table->string('profilephoto')->nullable();
            $table->string('postname')->nullable();
            $table->enum('status', [
                'pending',
                'rejected',
                'shortlisted',
                'selected',
                'on_hold',
                'closed'
            ])->default('pending');
            $table->string('marks')->nullable();
            $table->timestamps();
        
            // Define foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
