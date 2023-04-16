<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function index () {
        $checkouts = Checkout::with('Camp')->where('user_id', Auth::id())->get();
        return view('customer-dashboard', [ 'checkouts' => $checkouts ]);
    }
}
