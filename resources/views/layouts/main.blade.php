<!DOCTYPE html>
<html lang="en">

  @section('head')
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset( 'vendor/bootstrap/css/bootstrap.min.css' ) }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/clean-blog.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my-styles.css') }}" rel="stylesheet">
  </head>
  @show

  <body>

    @section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="/">{{ global_var('brand') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            @foreach( menu() as $menu_point )
              @if( $menu_point->menu_point === 'Logout' && Auth::check() == false )
                <?php continue ?>
              @endif
              @if( ( $menu_point->menu_point === 'Login' || $menu_point->menu_point === 'Registration' ) && Auth::check() == true )
                <?php continue ?>
              @endif
              <li class="nav-item">
                <a class="nav-link" href="{{ $menu_point->route }}">{{ $menu_point->menu_point }}</a>
              </li>
            @endforeach

          </ul>
        </div>
      </div>
    </nav>
    @show    
 
    @section('header')    
    <header>
      <div class="header-place parallaxie" style="background-image: url({{ asset($background_img) }})"></div>
      <div class="header-overlay shadow-overlay"></div>
      <div class="title-template-text">
        <h1 class="caption-header">{{ ucfirst($caption) }}</h1>
        <div class="subheading description-header">{{ ucfirst($description) }}</div>
      </div>
    </header>
    @show

    @section('content')
    @show

    @section('footer')
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">            
            <ul class="list-inline text-center">

              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>

              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>

              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </footer>
    @show

    <div class="parallaxie" style="margin-top: 10px; width: 100%; height: 200px; background-image: url({{ asset($background_img) }})"></div>
    <div class="footer-overlay shadow-overlay"></div>

    @section('js')
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/parallaxie.js') }}"></script>
    
    <script>
      $('.parallaxie').parallaxie({
        speed: 0.5,
      });
    </script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/clean-blog.min.js') }}"></script>

    <!-- for single post page -->
    <script src="{{ asset('js/components/single-post/comments.js') }}"></script>

    <!-- for index page -->
    <script src="{{ asset('js/components/index/list-of-posts.js') }}"></script>
    @show    

  </body>

</html>
