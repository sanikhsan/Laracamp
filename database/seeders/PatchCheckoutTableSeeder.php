<?php

namespace Database\Seeders;

use App\Models\Checkout;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatchCheckoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $checkouts = Checkout::where('total', 0)->get();
        foreach ($checkouts as $key => $checkout) {
            $checkout->update([
                'total' => $checkout->Camp->price * 1000
            ]);
        }
    }
}
