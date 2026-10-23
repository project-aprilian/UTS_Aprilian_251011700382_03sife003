<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('recipes', function (Blueprint $table) {
            if (!Schema::hasColumn('recipes', 'ingredients')) {
                $table->json('ingredients')->nullable();
            }

            if (!Schema::hasColumn('recipes', 'steps')) {
                $table->json('steps')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('recipes', function (Blueprint $table) {
            if (Schema::hasColumn('recipes', 'ingredients')) {
                $table->dropColumn('ingredients');
            }

            if (Schema::hasColumn('recipes', 'steps')) {
                $table->dropColumn('steps');
            }
        });
    }
};
