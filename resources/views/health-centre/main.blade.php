<!DOCTYPE html>
  <html>
    <head>
      @include('health-centre/partials._head')
    </head>
      <body>
        @include('health-centre/partials._horinav')
        @include('health-centre/partials._sidenav')
      <div class="main-container row">
        @include('health-centre/partials._mainnav')
        @include('health-centre/partials._messages')
        @yield('content')
        @include('health-centre/partials._footer')
      </div>
      <!-- end of .container -->
      @include('health-centre/partials._javascript')
    </body>
  </html>
