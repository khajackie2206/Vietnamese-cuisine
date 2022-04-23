<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
    <style>
        
    </style>
</head>
<body>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
        <!-- Header -->
        @include('header')
        <!-- Cart -->
        @include('cart')
        <!-- Slider -->
        @yield('content')
        @include('footer')
</body>
</html>
