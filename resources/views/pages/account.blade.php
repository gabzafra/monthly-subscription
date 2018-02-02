@extends('layouts.app')

@section('content')
<section class="container">
  <div class="card card-padded">
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success')}}
      </div>
    @endif
    <div class="section-header">
      <h2>Your Subscription</h2>
    </div>

    @if ($user->subscription('main')->onGracePeriod())
      <div class="alert alert-danger text-center">
          You have cancelled your subscription.</br>
          You have access to Animalgram until {{ $user->subscription('main')->ends_at->format('F d, Y') }}.
      </div>
    @endif

    @if ( ! $user->subscribed('main'))
      <div class="jumbotron text-center">
        <p>You don't have a subscription.</p>
        <a href="" class="btn btn-success btn-lg">Subscribe Now!</a>
      </div>
    @else
      <div class="row">
        <div class="col-sm-6">
          <div class="well text-center">
            <strong>Current Plan:</strong> {{ ucfirst($user->subscription('main')->stripe_plan) }}
          </div>
        </div>
        <div class="col-sm-6">
            <h4>Update Subscription</h4>
            <form action="/account/subscription" method="POST">
              {!! csrf_field() !!}
              <div class="form-group">
                <select name="plan" class="form-control">
                  <option value="bronze" {{ ($user->onPlan('bronze')) ? 'selected' : '' }}>Bronze ($5/mo)</option>
                  <option value="silver" {{ ($user->onPlan('silver')) ? 'selected' : '' }}>Silver ($10/mo)</option>
                  <option value="gold" {{ ($user->onPlan('gold')) ? 'selected' : '' }}>Gold ($15/mo)</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">
                {{ $user->subscription('main')->onGracePeriod() ? 'Reactivate' : 'Update Plan'}}
              </button>
            </form>
        </div>
      </div>
    @endif

    <div class="section-header">
      <h2>Update Card</h2>
    </div>

    <form action="/account/card" method="POST" id="subscribe-form">

      {!! csrf_field() !!}

      <div class="form-group row">
        <div class="col-xs-8">
          <label>Credit Card Number</label>
          <input type="text" class="form-control" placeholder="**** **** **** {{ $user->card_last_four }}" data-stripe="number">
        </div>
        <div class="col-xs-4">
          <label>CVC</label>
          <input type="text" class="form-control" placeholder="123" data-stripe="cvc">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-xs-3">
          <label>Expiration Month</label>
          <input type="text" class="form-control" placeholder="08" data-stripe="exp-month">
        </div>
        <div class="col-xs-3">
          <label>Expiration Year</label>
          <input type="text" class="form-control" placeholder="2020" data-stripe="exp-year">
        </div>
      </div>
      <div class="stripe-errors"></div>

      <button type="submit" class="btn btn-primary">Update Plan</button>

    </form>

    <div class="section-header">
      <h2>Billing History</h2>
    </div>
      @if (count($invoices) > 0)
        <table class="table table-bordered table-striped table-hover">
          @foreach ($invoices as $invoice)
            <tr>
              <td>{{ $invoice->date()->toFormattedDateString() }}</td>
              <td>{{ $invoice->total() }}</td>
              <td class="col-xs-2">
                <a href="/account/invoices/{{ $invoice->id }}" class="btn btn-primary btn-sm">Download</a>
              </td>
            </tr>
          @endforeach
        </table>
      @else
        <div class="jumbotron text-center">
          <p>No billing history</p>
        </div>
      @endif

    <form action="/account/subscription" method="POST" class="text-right">
      {!! csrf_field() !!}
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit" class="btn btn-link">Cancel Subscription</button>
    </form>
  </div>
</section>

@endsection
