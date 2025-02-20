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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->text('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('pincode')->nullable();
            $table->string('contact_no')->nullable();
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
            $table->string('postname')->nullable();
            $table->string('profilephoto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
