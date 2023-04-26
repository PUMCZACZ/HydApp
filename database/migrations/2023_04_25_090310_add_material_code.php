<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->unsignedFloat('purchase_price');
            $table->unsignedFloat('sale_price')->nullable();
            $table->unsignedFloat('margin');
            $table->string('unit_si');
            $table->string('material_code');
            $table->dropColumn('material_type');
        });
    }

    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropColumn('purchase_price');
            $table->dropColumn('sale_price');
            $table->dropColumn('margin');
            $table->dropColumn('unit_si');
            $table->dropColumn('material_code');
            $table->string('material_type');
        });
    }
};
