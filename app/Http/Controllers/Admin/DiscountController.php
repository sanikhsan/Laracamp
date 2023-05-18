<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountStoreRequest;
use App\Http\Requests\Admin\DiscountUpdateRequest;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discount.index', [
            'discounts' => $discounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountStoreRequest $request)
    {
        Discount::create($request->all());
        $request->session()->flash('discount-success', "Horray, Discount \"{$request->name}\" has been created!");

        return redirect(route('admin.discount.index'));
    }

    /**
     * Display the specified resource.
     *
     * public function show(Discount $discount)
     * {
     *   //
     * }
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        return view('admin.discount.edit', [
            'discount' => $discount
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountUpdateRequest $request, Discount $discount)
    {
        $discount->update($request->all());
        $request->session()->flash('discount-success', "Discount \"{$discount->name}\" has been updated!");

        return redirect(route('admin.discount.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,Discount $discount)
    {
        $request->session()->flash('discount-warning-success', "Oops! Discount \"{$discount->name}\" has been deleted!");
        $discount->delete();

        return redirect(route('admin.discount.index'));
    }
}
