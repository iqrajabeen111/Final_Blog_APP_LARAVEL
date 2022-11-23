<!doctype html>
<html>
<head>
   @include('layout.head')
</head>
<body>
<div class="container-lg">
   @if(Auth::user())
   <header class="">
       @include('layout.header')
   </header>
   @endif
   <div id="main" class="">
           @yield('content')
   </div>

</div>
</body>
</html>