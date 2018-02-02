<!DOCTYPE html>
<html lang="eng">
  <head>
    <meta charset="utf-8">
    <title>Cashier App</title>

    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>

    <div id="site-header">
        @include('partials.header')
    </div>

    <main id="site-main">
        @yield('content')
    </main>

    <div id="site-footer">
        @include('partials.footer')
    </div>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        Stripe.setPublishableKey("{{ env('STRIPE_KEY') }}");
    </script>
    <script src="js/all.js"></script>
  </body>
</html>
