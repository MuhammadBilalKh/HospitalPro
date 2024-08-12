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
        Schema::table('users', function(Blueprint $blueprint){
            $blueprint->unsignedBigInteger("block_id")->nullable();
            $blueprint->unsignedBigInteger('department_id')->nullable();
            $blueprint->unsignedBigInteger("ward_id")->nullable();
            $blueprint->string('profile_picture');

            $blueprint->foreign('block_id')->references('id')->on("blocks");
            $blueprint->foreign("department_id")->references("id")->on("departments");
            $blueprint->foreign("ward_id")->references("id")->on("wards");
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
