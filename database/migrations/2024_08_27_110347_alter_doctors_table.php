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
        Schema::table("doctors", function(Blueprint $blueprint){
            $blueprint->tinyInteger("account_status")->unsigned()->default(1);
            $blueprint->time("consulting_start_time");
            $blueprint->time("consulting_end_time");
            $blueprint->string("cnic", 100)->unique();
            $blueprint->string('email_verification_token', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
