@extends('layouts.app')

@section('content')

<div class="hero">
  <div class="hero-content">
    <h1>You're Joining!</h1>
    <h2>Hooray!</h2>
  </div>
</div>

<section class="container">
  <div class="card card-padded">
      <form action="/subscribe" method="POST" id="subscribe-form">
        @if (Auth::guest())
        <div class="section-header">
          <h2>User Info</h2>
        </div>

        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        @endif
        <div class="section-header">
          <h2>Subscription Info</h2>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-xs-4">
              <div class="subscription-option">
                <input type="radio" id="plan-bronze" name="plan" value="bronze" checked>
                <label for="plan-bronze">
                    <span class="plan-price">$5 <small>/mo</small></span>
                    <span class="plan-name">Bronze</span>
                </label>
              </div>
            </div>
            <div class="col-xs-4">
              <div class="subscription-option">
                <input type="radio" id="plan-silver" name="plan" value="silver">
                <label for="plan-silver">
                    <span class="plan-price">$10 <small>/mo</small></span>
                    <span class="plan-name">Silver</span>
                </label>
              </div>
            </div>
            <div class="col-xs-4">
              <div class="subscription-option">
                <input type="radio" id="plan-gold" name="plan" value="gold">
                <label for="plan-gold">
                    <span class="plan-price">$15 <small>/mo</small></span>
                    <span class="plan-name">Gold</span>
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="section-header">
          <h2>Credit Card Info</h2>
        </div>

          <div class="form-group row">
            <div class="col-xs-8">
              <label>Credit Card Number</label>
              <input type="text" class="form-control" placeholder="4242 4242 4242 4242" data-stripe="number">
            </div>
            <div class="col-xs-4">
              <label>CVC</label>
              <input type="text" class="form-control" placeholder="123" data-stripe="cvc">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-xs-3">
              <label>Expiration Month</label>
              <input type="text" class="form-control" placeholder="01" data-stripe="exp-month">
            </div>
            <div class="col-xs-3">
              <label>Expiration Year</label>
              <input type="text" class="form-control" placeholder="2020" data-stripe="exp-year">
            </div>
          </div>

          <div class="form-group text-center">\
            <button type="submit" class="btn btn-lg btn-success btn-block">Join</button>
          </div>
      </form>
  </div>
</section>
@endsection
