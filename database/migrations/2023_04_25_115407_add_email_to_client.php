<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('post_code')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('city');
            $table->dropColumn('street');
            $table->dropColumn('post_code');
        });
    }
};
