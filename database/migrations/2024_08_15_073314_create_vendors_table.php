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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string("vendor_name");
            $table->string("contact_person")->nullable();
            $table->string("mobile_number")->nullable();
            $table->string('email')->unique();
            $table->string('fax_number')->nullable();
            $table->string("city");
            $table->string("bank_name");
            $table->string("account_number");
            $table->text("notes")->nullable();
            $table->decimal("vendor_rating", 4, 2)->nullable();
            $table->text("reviews")->nullable();
            $table->integer("delivery_days")->unsigned()->nullable();
            $table->tinyInteger("is_return_policy_applicable")->unsigned();
            $table->foreignId('user_id')->constrained("users");
            $table->tinyInteger('purchasing_applicable')->unsigned(); //1 => Purchasing Allowed, 0 => Not Allowed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
