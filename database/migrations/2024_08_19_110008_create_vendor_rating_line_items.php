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
        Schema::create('vendor_rating_line_items', function (Blueprint $table) {
            $table->id();
            $table->float("pricing");
            $table->float("quality");
            $table->float("experience");
            $table->float("customer_references");
            $table->float("techincal_expertise");
            $table->float("compilance_and_requirements");
            $table->float("sustainability_practices");
            $table->float("scalability");
            $table->float("financial_stability");
            $table->float("operating");
            $table->float("support_and_maintenance");
            $table->float("contact_terms");
            $table->float("innovation_capabilities");
            $table->float("cultural_fit");
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('vendor_id')->constrained("vendors");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_rating_line_items');
    }
};
