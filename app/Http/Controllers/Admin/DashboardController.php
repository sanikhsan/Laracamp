<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminConfirmation;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index () {
        $checkouts = Checkout::with('Camp')->get();
        return view('admin.dashboard', [ 'checkouts' => $checkouts ]);
    }

    public function updatePaid(Request $request, Checkout $checkout) {
        $checkout->is_paid = true;
        $checkout->save();

        Mail::to($request->user())->send(new AdminConfirmation($checkout));

        $request->session()->flash('success', "User's Name: {$checkout->User->name} and Camp: {$checkout->Camp->title}");
        return redirect(route('admin.dashboard'));
    }
}
