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
        Schema::table('checkouts', function (Blueprint $table) {
            $table->string('payment_status', 100)->default('waiting')->after('camp_id');
            $table->string('midtrans_url')->nullable()->after('payment_status');
            $table->string('midtrans_booking_code')->nullable()->after('midtrans_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->dropColumn(['payment_status', 'midtrans_url', 'midtrans_booking_code']);
        });
    }
};
