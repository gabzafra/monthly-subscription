<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function showAccount(Request $request)
    {
      $user = $request->user();
      $invoices = $user->subscribed('main') ? $user->invoices() : null;
      return view('pages.account', compact('user', 'invoices'));
    }

    public function updateSubscription(Request $request)
    {
      $user = $request->user();

      $plan = $request->input('plan');

      if($user->subscribed('main') and $user->subscription('main')->onGracePeriod()){

        if($user->onPlan($plan)) {
          $user->subscription('main')->resume();
        } else {
          $user->subscription('main')->resume()->swap($plan);
        }
      } else {

      $user->subscription('main')->swap($plan);

      }


      return redirect('account')->with(['success' => 'Subscription updated.']);
    }

    public function updateCard(Request $request)
    {
      $user = $request->user();

      $ccToken = $request->input('cc_token');

      $user->updateCard($ccToken);

      return redirect('account')->with(['success' => 'Credit card updated.']);
    }
    public function deleteSubscription(Request $request)
    {
      $user = $request->user();

      $user->subscription('main')->cancel();

      return redirect('account')->with(['success' => 'Subscription cancelled.']);

    }

    public function downloadInvoice($invoiceId)
    {
      return Auth::user()->downloadInvoice($invoiceId, [
          'vendor' => 'Animalgram',
          'product' => 'Monthly Subscription'
      ]);
    }
}
