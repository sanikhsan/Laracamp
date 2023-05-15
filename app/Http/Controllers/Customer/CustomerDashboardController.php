<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function index () {
        $checkouts = Checkout::with('Camp')->where('user_id', Auth::id())->get();
        return view('customers.dashboard', [ 'checkouts' => $checkouts ]);
    }
}
