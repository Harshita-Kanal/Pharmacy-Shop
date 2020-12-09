<html>
    <head>
    <!-- #e1b5ff #e3075f  #6b00b3- -->
        <title>Pharmacy Shop</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
        <link rel="stylesheet", href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN", crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #e3075f; padding: 15px;  box-shadow: 0 8px 6px -6px gray;"> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/">MedEasy</a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/medicines">Pharmacy</a>
      </li>
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Health</a>
      </li> -->
      <li class="nav-item active">
        <a class="nav-link" href="/covid-essentials">Covid-19</a>
      </li>     
    </ul>
      <div class = "mr-3">
        <form action = "{{ route('search') }}" class="form-inline my-2 my-lg-0">
          <input class="form-control" value = "{{ request()->input('query') }}" name = "query"  type="search" placeholder="Search For Products" aria-label="Search">
          <button class="btn btn-success" type="submit"><span style = "padding: 2px;"><i class = "fa fa-search"></span></i></button>
        </form>
      </div>
    <nav>
    <ul class = "navbar-nav ">
    @guest
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('register') }}">Register</a>
    </li>
    @else
    <li class="nav-item active">   
         <a  href = "{{ route('users.edit') }}" class = "nav-link">My Account</a>                    
    </li>
    <li class="nav-item active">   
          <a class = "nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>                       
    </li>

    @endguest
      <li class="nav-item active">
        <a class="nav-link" href="/medicine-list">List</a>
      </li>
    </nav>
    </ul>
  </div>
</nav>
</header>
<main>
        <div>
            @yield('content')
        </div>
</main>
<footer class="page-footer font-small" style = "background-color: #e3075f;">
  <div class="footer-copyright text-center py-3" style = "color: #ffffff;">Made with care 🌼
  </div>
</footer>
</body>
</html>