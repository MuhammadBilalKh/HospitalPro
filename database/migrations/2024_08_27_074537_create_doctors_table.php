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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture');
            $table->string('doctor_name')->index();
            $table->string('login_name')->unique()->index();
            $table->string("password")->nullable();
            $table->tinyInteger("is_first_login")->unsigned()->default(0);
            $table->enum("gender", ["Male", "Female"]);
            $table->string("mobile_number")->unique()->index();
            $table->string("email_address")->unique()->index();
            $table->string("medical_license_number")->index();
            $table->enum("specialization", [
                "Cardiology",
                "Neurology",
                "Orthopedics",
                "Pediatrics",
                "General Surgery",
                "Dermatology",
                "Gynecology",
                "Oncology",
                "Radiology",
                "Psychiatry",
                "Anesthesiology",
                "Ophthalmology",
                "ENT",
                "Urology",
                "Nephrology",
                "Gastroenterology",
                "Endocrinology",
                "Pulmonology"
            ])->index();
            $table->text("address");
            $table->string('qualification')->index();
            $table->integer("years_of_experience")->unsigned();
            $table->foreignId('department_id')->constrained("departments");
            $table->foreignId("user_id")->constrained("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
