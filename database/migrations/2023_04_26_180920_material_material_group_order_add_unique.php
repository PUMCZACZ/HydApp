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
        Schema::table('material_material_group_order', function (Blueprint $table) {
            $table->unique(['order_id', 'material_id']);
            $table->dropForeign(['material_group_id']);
            $table->dropColumn('material_group_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('material_material_group_order', function (Blueprint $table) {
            $table->dropUnique(['order_id', 'material_id']);
            $table->foreignId('material_group_id')->constrained()->onDelete('cascade');
        });
    }
};
