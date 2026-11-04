<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            if (!Schema::hasColumn('movies', 'price')) {
                $table->decimal('price', 12, 2)->default(35000)->after('genre');
            }
        });
    }

    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
};
