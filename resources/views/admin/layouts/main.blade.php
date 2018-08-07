<!DOCTYPE html>
<html lang="en">

  @section('head')
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset( 'vendor/bootstrap/css/bootstrap.min.css' ) }}" rel="stylesheet">
    <link href="{{ asset('vendor/jqPagination/jqpagination.css') }}" rel="stylesheet">
    <link href="{{ asset( 'css/my-admin-styles.css' ) }}" rel="stylesheet">

    <link href="{{ asset('vendor/SimplePagination/simplePagination.css') }}" rel="stylesheet">
  </head>
  @show

  <body>

    @section('header')    
    <div>
      <h1 class="text-center header">AdminPanel</h1>
    </div>
    @show  

    @section('content')
    @show

    @section('footer')
    <div style="width: 100%; height: 50px; background-color: #666; margin-top: 30px;">
    </div>
    @show

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/admin/components/index/page-manager.js') }}"></script>
    <script src="{{ asset('js/admin/components/index/menu.js') }}"></script>
    <script src="{{ asset('js/admin/components/index/users.js') }}"></script>
    <script src="{{ asset('js/admin/components/index/post-manager.js') }}"></script>
    <script src="{{ asset('js/admin/components/index/list-of-posts.js') }}"></script>

    <script src="{{ asset('vendor/SimplePagination/jquery.simplePagination.js') }}"></script>
  </body>

</html>