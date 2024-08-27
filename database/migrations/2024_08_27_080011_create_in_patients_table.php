<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('in_patients', function (Blueprint $table) {
            $table->id();
            $table->string("attendant_name");
            $table->string("attendant_mobile_number")->index()->nullable();
            $table->string("attendant_cnic")->index()->nullable();
            $table->foreignId('patient_id')->constrained("patients");
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("ward_id")->constrained("wards");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('in_patients');
    }
};
