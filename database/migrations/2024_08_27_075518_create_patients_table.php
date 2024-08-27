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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string("patient_name")->index();
            $table->string("father_name")->nullable();
            $table->tinyInteger('age')->unsigned();
            $table->text("address")->nullable();
            $table->enum("gender", ["Male", "Female"]);
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->foreignId("user_id")->constrained('users');
            $table->tinyInteger('is_processed')->unsigned()->default(1);
            $table->string('cnic')->nullable()->index();
            $table->string("mobile_number")->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
