<header class="p-3 navbar-market">
  <div class="container ">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <img class="image" border="0" src="/assets/img/logo-png.png"  width="100px" style="margin-right: 30px;padding: 0px color:white;">

      <form class="col-12 col-lg-7 mb-3 mb-lg-0 me-lg-3">
        
        <div class="d-flex justify-content-center px-5">
          <div class="search">
            <input type="text" class="search-input" placeholder="Search..." name="">
            <a href="#" class="search-icon"> <i class="fa-solid fa-search fa-lg"></i></a>
          </div>
        </div>
        {{-- <input type="search" class="form-control form-control search rounded-input" placeholder="Search..." aria-label="Search"> --}}
      </form>

        <ul class="nav col-4 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-men"><a href="#" class="nav-link px-2 "><i class="fa-solid fa-store fa-lg menus"></i></a></li>
            <li class="nav-men"><a href="#" class="nav-link px-2 "><i class="fa-solid fa-store-alt fa-lg menus"></i></a></li>
            <!-- <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
            <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
            <li><a href="#" class="nav-link px-2 text-white">About</a></li> -->
        </ul>
      @auth
        {{auth()->user()->name}}
        <div class="text-end">
          <a href="{{ route('logout.perform') }}" class="btn btn-outline-dark me-2">Logout</a>
        </div>
      @endauth

      @guest
        <div class="text-end">
          <a href="{{ route('login.show') }}" class="btn btn-outline-dark me-2 auth-btn-in">Login</a>
          <a href="{{ route('register.show') }}" class="btn btn-warning auth-btn-up">Sign-up</a>
        </div>
      @endguest
    </div>
  </div>
</header>