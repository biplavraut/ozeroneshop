<!--
Authors: Pers Creation, Gaze Nepal Pvt. Ltd. , Biplav Raj Raut
Authors URI: www.perscreation.com, www.gazenepal.com, www.biplavrajraut.com.np
Copyright: Pers Creation, Gaze Nepal,Biplav Raj Raut.
-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Biplav Raj Raut">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Ozerone Shop</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
<div>
  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
</div>
    <div class="wrapper" id="app">
      <router-view :key="$route.fullPath"></router-view>

      <vue-progress-bar></vue-progress-bar>
    </div>
  </div>
  @auth
    <script>
        window.user = @json(auth()->user());
    </script>
@endauth
  <script src="{{asset('js/index.js')}}"></script>
  <!-- Argon Scripts -->
</body>

</html>
