@extends('layouts.customers.app')

@section('content')
<section class="checkout">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 col-12">
                <img src="{{asset('landing/images/ill_register.png')}}" height="400" class="mb-5" alt=" ">
            </div>
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    WHAT A DAY!
                </p>
                <h2 class="primary-header ">
                    Payment is Successfully!
                </h2>
                <p>Your transaction is Success, now you can enjoy the benefits Camp.</p>
                <a href="{{route('customer.dashboard')}}" class="btn btn-primary mt-3">
                    My Dashboard
                </a>
            </div>
        </div>
    </div>
</section>
@endsection