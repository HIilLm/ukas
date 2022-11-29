<div class="page-header">
    <nav class="navbar navbar-expand-lg d-flex justify-content-between">
        <div class="" id="navbarNav">
            <ul class="navbar-nav" id="leftNav">
                <li class="nav-item">
                    <a class="nav-link" id="sidebar-toggle" href="#"><i data-feather="arrow-left"></i></a>
                  </li>
                <li class="nav-item">
                 {{-- <a href="/" class="nav-link" id="sidebar-toggle"> --}}
                    <a class="imgpno logo navbar-brand " href="/">
                     <img src="{{ asset('/images.png') }}" style="height: 40px" alt="http://www.smkn1-sby.sch.id/">
                </a>
                    {{-- <a class="nav-link" id="sidebar-toggle"  href="#"><i data-feather="arrow-left"></i></a> --}}
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li> --}}
            </ul>
        </div>
        @auth
        <div class="headerNav">
            <div class="ms-5">
                <a class="dark" href="#" onclick="out()">
                    {{ __('Logout') }}
                    <i data-feather="log-out"></i>
                </a>
                <form id="logout-form"
                action="{{ route('logout') }}"
                 method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        @endauth
    </nav>
</div>
