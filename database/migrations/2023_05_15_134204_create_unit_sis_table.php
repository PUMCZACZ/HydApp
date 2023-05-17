<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unit_sis', function (Blueprint $table) {
            $table->id();
            $table->string('unit_si_name');
            $table->string('unit_si_short_name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unit_sis');
    }
};
