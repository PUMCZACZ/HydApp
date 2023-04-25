<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->float('purchase_price');
            $table->float('sale_price')->nullable();
            $table->float('margin');
            $table->string('unit_si');
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
            $table->string('material_type');
        });
    }
};
