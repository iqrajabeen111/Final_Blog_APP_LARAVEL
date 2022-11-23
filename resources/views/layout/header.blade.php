<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="">Welcome {{ Auth::user()->name}}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
  
      <li class="nav-item">
      <a class="nav-link" href="{{route('categoryindex')}}">List Category</a>
      </li>
 
      <li class="nav-item">
      <a class="nav-link" href="{{route('post-list')}}">List Posts</a>

      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">

      <a class="nav-link" href="{{ route('logout') }}">Logout</a>
    </form>
  </div>
</nav>