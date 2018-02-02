@extends ('layouts.app')

@section('content')
    <div class="container">
      <article class="card post-single">
        <div class="img-container" style="background-image:url('{{ $post->image }}')"></div>

        <div class="card-content">

            <header class="post-header">
                <h1>{{ $post->title }}</h1>
                <div class="byline">{{ $post->author->name }}</div>
            </header>
            @if ( ! (Auth::user() and Auth::user()->subscribed('main')))
              <div class="jumbotron text-center">
                <h2>Subscribe to gain access</h2>
                <p>This great post is reserved for our paid subscribers. Join to get access!</p>
                <a href="/subscribe" class="btn btn-lg btn-danger">Subscribe Now</a>
              </div>
            @else
              {!! $post->content !!}
            @endif
        </div>
      </article>
    </div>
@endsection
