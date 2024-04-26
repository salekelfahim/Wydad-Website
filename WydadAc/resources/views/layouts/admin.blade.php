<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wydad AC | Dashboard</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
  <!-- Custom styles -->
  @vite('resources/css/dashboard.css')
  @vite('resources/js/admin.js')
</head>

<body>
  <div class="layer"></div>
  <!-- ! Body -->
  <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
  <div class="page-flex">
    <!-- ! Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-start">
        <div class="sidebar-head">
          <span class="icon logo" aria-hidden="true"></span>
          <div style="margin-left: 25%; margin-top: -10%" class="logo-text">
            <img src="{{ asset('images/Logo_Wydad_Athletic_Club.png') }}" class="logo" style="width: 35%; height:30%;margin-left:8%">
            <span style="margin-left: -10%;" class="logo-title">Wydad Ac</span>
            <span class="logo-subtitle">Dashboard</span>
          </div>
          <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
            <span class="sr-only">Toggle menu</span>
            <span class="icon menu-toggle" aria-hidden="true"></span>
          </button>
        </div>
        <div class="sidebar-body">
          <ul class="sidebar-body-menu">
            <li>
              <a class="active" href="/dashboard"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
            </li>
            <li>
              <a class="show-cat-btn" href="/playerslist">
                <span class="icon document" aria-hidden="true"></span>Players
              </a>
            </li>
            <li>
              <a class="show-cat-btn" href="/stafflist">
                <span class="icon folder" aria-hidden="true"></span>Staff
              </a>
            </li>
            <li>
              <a class="show-cat-btn" href="/productslist">
                <span class="icon document" aria-hidden="true"></span>Products
              </a>
            </li>
            <li>
              <a class="show-cat-btn" href="/gameslist">
                <span class="icon folder" aria-hidden="true"></span>Games
              </a>
            </li>
          </ul>
        </div>
      </div>
    </aside>
    <div class="main-wrapper">
      <!-- ! Main nav -->
      <nav class="main-nav--bg">
        <div class="container main-nav">
          <div class="main-nav-start">
          </div>
          <div class="main-nav-end">
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
              <span class="sr-only">Toggle menu</span>
              <span class="icon menu-toggle--gray" aria-hidden="true"></span>
            </button>
            <div class="lang-switcher-wrapper">
              <button class="lang-switcher transparent-btn" type="button">
                @auth
                {{ auth()->user()->firstname }}
                @endauth
                <i data-feather="chevron-down" aria-hidden="true"></i>
              </button>
            </div>
            <div class="lang-switcher-wrapper">
              <li>
                <a href="{{route('logout')}}">
                  <i class="fas fa-door-open" title="LOGOUT" style="color: black;"></i>
                </a>
              </li>
            </div>
          </div>
        </div>
      </nav>

      <div>
        @yield('content')
      </div>

      <!-- ! Footer -->
      <!-- <footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
      <p>2021 © Elegant Dashboard - <a href="elegant-dashboard.com" target="_blank"
          rel="noopener noreferrer">elegant-dashboard.com</a></p>
    </div>
    <ul class="footer-end">
      <li><a href="##">About</a></li>
      <li><a href="##">Support</a></li>
      <li><a href="##">Puchase</a></li>
    </ul>
  </div>
</footer> -->
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <!-- Chart library -->
  <script src="./plugins/chart.min.js"></script>
  <!-- Icons library -->
  <script src="plugins/feather.min.js"></script>
  <!-- Custom scripts -->
</body>

</html>