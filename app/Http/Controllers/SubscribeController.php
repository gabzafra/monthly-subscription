<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscribeController extends Controller
{

    public function showSubscribe()
    {
        return view('pages.subscribe');
    }

    public function processSubscribe(Request $request)
    {
      
    }
}
