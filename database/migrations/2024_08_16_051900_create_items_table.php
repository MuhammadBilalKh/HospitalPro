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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("strength");
            $table->string("description")->nullable();
            $table->enum("item_form", ["Tablet", "Capsule", "Syrups", "Injection", "Creams and Ointment", "Gels", "Lotion", "Drop", "Inhaler", "Suspensions"]);
            $table->integer("unit_price")->unsigned();
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("vendor_id")->constrained("vendors");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
