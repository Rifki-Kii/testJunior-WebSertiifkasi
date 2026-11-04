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
        Schema::table('orders', function (Blueprint $table): void {
            $table->renameColumn('payment_proof', 'proof_of_payment');
            $table->time('watch_at')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table): void {
            $table->dateTime('watch_at')->change();
            $table->renameColumn('proof_of_payment', 'payment_proof');
        });
    }
};
