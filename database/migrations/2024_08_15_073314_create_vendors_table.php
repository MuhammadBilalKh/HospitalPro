<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string("vendor_name")->index();
            $table->string("contact_person")->nullable()->index();
            $table->string("mobile_number")->nullable()->index();
            $table->string('email')->unique()->index();
            $table->string('fax_number')->nullable()->index();
            $table->string("city")->index();
            $table->string("bank_name")->index();
            $table->string("account_number")->index();
            $table->decimal("vendor_rating", 4, 2)->nullable()->index();
            $table->text("reviews")->nullable()->index();
            $table->integer("delivery_days")->unsigned()->nullable()->index();
            $table->tinyInteger("is_return_policy_applicable")->unsigned()->index();
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
