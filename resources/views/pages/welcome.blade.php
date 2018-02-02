@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="hero-content">
      <h1>Welcome to Our App!</h1>
      <h1>You're going to love it!</h1>
      <p></p>
    </div>
  </div>

  <section class="container">
    <div class="section-header">
      <h2>Premium Posts</h2>
    </div>
    
    <p class="text-center lead">You now have access to these premium posts!</p>

    <div class="row">

        @foreach ($posts as $post)
            <div class="col-sm-6 col-md-4 col-lg-3">
                @include('partials.post-card', ['post' => $post])
            </div>
        @endforeach
    </div>
  </section>
@endsection
