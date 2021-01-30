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
  <title>Ecommerce Dashboard - Ozerone Shop - by Pers Creation</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/nestable.css')}}">
  <link rel="stylesheet" href="{{asset('css/vendor.css')}}">
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
  <script src="{{asset('js/app.js')}}"></script>
  <!-- Argon Scripts -->
  <script type="text/javascript" src="https://chir.ag/projects/ntc/ntc.js"></script>
<script type="text/javascript">
    function colorName(){
        hex = $('#inputcolorhex').val();
        var n_match = ntc.name(hex);
        n_rgb = n_match[0]; // RGB value of closest match
        n_name = n_match[1]; // Text string: Color name
        n_exactmatch = n_match[2]; // True if exact color match
        //this.ciform.color = n_name;
        //$('#inputcolorname').val(n_name);
        if(n_name != 'Invalid Color'){
            document.getElementById("inputcolorname").innerHTML=n_name; 
        }
        
    } 

</script>
</body>

</html>
