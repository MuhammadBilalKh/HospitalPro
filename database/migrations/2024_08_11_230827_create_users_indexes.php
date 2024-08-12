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
        Schema::table('users', function(Blueprint $table){
            $table->index("cnic", "idx_user_cnic");
            $table->index("mobile_number", "idx_user_mobile_number");
            $table->index("login_name", "idx_user_login_name");
            $table->index("email", "idx_user_email");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_indexes');
    }
};
