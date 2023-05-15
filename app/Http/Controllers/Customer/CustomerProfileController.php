<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CustomerProfileController extends Controller
{
    /**
     * Display the Admin profile form.
     */
    public function edit(Request $request): View
    {
        return view('customers.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the Admin profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        $request->session()->flash('success', "Data telah berhasil diperbaharui.");

        return Redirect::route('customer.edit');
    }
}
