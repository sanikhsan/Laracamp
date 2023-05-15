@extends('layouts.customers.app')

@section('content')
<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class="col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    PROFILE
                </p>
                <h2 class="primary-header">
                    My Profile
                </h2>
            </div>
        </div>
        @include('components.customer-update')
        <div class="card my-5">
            <div class="card-header">
                <h4 class="mt-2">Profile Information</h4>
                <p class="mb-0">Update your account profile information and email address.</p>
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('customer.update')}}">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" required readonly>
                  </div>
                  <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
        </div>
        {{-- <div class="card my-5">
            <div class="card-header">
                <h4 class="mt-2">Update Password</h4>
                <p class="mb-0">Ensure your account is using a long, random password to stay secure.</p>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input type="password" class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control">
              </div>
              <a href="#" class="btn btn-primary">Save</a>
            </div>
        </div> --}}
    </div>
</section>
@endsection