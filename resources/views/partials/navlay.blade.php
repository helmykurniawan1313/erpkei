

    <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
  
        <a href="/" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="sitename">{{ $profile[0]->company_name }}</h1> <span>.</span>
        </a>
  
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="/"  class=" {{ $active === '/' ? 'active' : '' }}">Home</a></li>
            <li><a href="/about" class=" {{ $active === 'about' ? 'active' : '' }}">About</a></li>
            
            <li><a href="/projects">Projects</a></li>
            <li><a href="/posts" class=" {{ $active === 'posts' ? 'active' : '' }}">Blog</a></li>
            <li><a href="/contact" class=" {{ $active === 'contact' ? 'active' : '' }}">Contact</a></li>
            {{-- <li><a href="blog.html">Login</a></li> --}}
            {{-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Dropdown 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                  <ul>
                    <li><a href="#">Deep Dropdown 1</a></li>
                    <li><a href="#">Deep Dropdown 2</a></li>
                    <li><a href="#">Deep Dropdown 3</a></li>
                    <li><a href="#">Deep Dropdown 4</a></li>
                    <li><a href="#">Deep Dropdown 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Dropdown 2</a></li>
                <li><a href="#">Dropdown 3</a></li>
                <li><a href="#">Dropdown 4</a></li>
              </ul>
            </li> --}}
            {{-- <li><a href="contact.html">Contact</a></li> --}}
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
  
      </div>
    </header>
  