<!DOCTYPE html>
<html>
    <head>
        <title>kayden Fileserver - @yield('title')</title>
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        {!! Html::style('css/app.css') !!}

    </head>
    <body>
        @if(\Auth::check())
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">kayden files</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
              @if(\Auth::check())
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#">My Files</a></li>
                    <li ><a href="#">Upload New File</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li><a href="/files/logout" class="navbar-link">Logout</a></li>
                  </ul>
              @else 
                  <ul class="nav navbar-nav">
                    
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li><a href="/files/register" class="navbar-link">Register</a></li>
                      <li><a href="/files/login" class="navbar-link">Login</a></li>
                  </ul>
              @endif
            </div>
          </div>
        </nav>
        @endif
        @section('sidebar')
            
        @show

        <div class="container">
            <div class="content">
            <div class="page-header-wrap">
                <h1 class="page-header"><i class="fa fa-angle-right"></i> @yield('title')</h1>
                <p class="lead text-right">@yield('title-lead')</p>
            </div>
                @yield('content')
            </div>
        </div>
        {!! Html::script('js/all.js') !!}
        
        {!! Html::script('js/app.js') !!}
    </body>
</html>