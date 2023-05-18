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
            $table->foreignId('discount_id')->nullable()->after('midtrans_booking_code');
            $table->unsignedInteger('discount_percentage')->nullable()->after('discount_id');
            $table->unsignedInteger('total')->default(0)->after('discount_percentage');

            // Create Relationship table Checkouts with table Discount
            $table->foreign('discount_id')->references('id')->on('discounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->dropForeign('checkouts_discount_id');
            $table->dropColumn(['discount_id', 'discount_percentage', 'total']);
        });
    }
};
