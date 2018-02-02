<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{

    public function showSubscribe()
    {
        return view('pages.subscribe');
    }

    public function processSubscribe(Request $request)
    {
        $user = $request->user();

        if( ! $user) {
          $this->validate($request, [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6'
          ]);

          try {
            $user = User::create([
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
                'password'  => bcrypt($request->input('password')),
            ]);
            Auth::login($user);

          } catch (\Exception $e) {
              return back()->withErrors(['message' => 'Error creating user.']);
          }
      }

      $ccToken = $request->input('cc_token');
      $plan = $request->input('plan');

      try{
        $user->newSubscription('main', $plan)->create($ccToken, [
            'email' => $user->email
        ]);
      } catch (\Exception $e) {
          return back()->withErrors(['message' => 'Error creating subscription.']);
      }

      return redirect('welcome');
    }

    public function showWelcome()
    {
      $posts = Post::where('premium', true)->get();
      return view('pages.welcome', compact('posts'));  
    }

}
