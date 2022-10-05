<div class="page-sidebar">
    <ul class="list-unstyled accordion-menu">
        <li class="sidebar-title">
            Main
        </li>
        <li class="{{ $page === 'Admin' ? 'active-page' : '' }}">
            <a href="/admin"><i data-feather="airplay"></i>Dashboard</a>
        </li>
        <li class="sidebar-title">
            Apps
        </li>
        <li class="{{ $page === 'General' ? 'active-page' : '' }}">
            <a href="/admin/general"><i data-feather="tool"></i>General</a>
        </li>
        {{-- <li
            class="{{ $page === 'Setting' ? 'active-page' : '' }} {{ $page === 'General' ? 'active-page' : '' }} {{ $page === 'categories' ? 'active-page' : '' }} {{ $page === 'Page' ? 'active-page' : '' }}">
            <a href="#"><i data-feather="tool"></i>Settings<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul>
                <li><a href="/admin/general" class="{{ $page === 'General' ? 'active' : '' }}"><i
                            class="far fa-circle"></i>General</a></li>
                <li><a href="/admin/categories" class="{{ $page === 'categories' ? 'active' : '' }}"><i
                            class="far fa-circle"></i>Categories</a></li>
            </ul>
        </li> --}}
        <li class="{{ $page === 'Home' ? 'active-page' : '' }} {{ $page === 'Benefit' ? 'active-page' : '' }}">
            <a href="#"><i data-feather="home"></i>Home Page<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul>
                <li><a href="/admin/home" class="{{ $page === 'Home' ? 'active' : '' }}"><i
                            class="far fa-circle"></i>Home Page</a></li>
                <li><a href="/admin/benefit" class="{{ $page === 'Benefit' ? 'active' : '' }}"><i
                            class="far fa-circle"></i>Benefit</a></li>
                {{-- <li class="{{ $page === 'Benefit' ? 'active' : '' }}">
                    <a href="/admin/benefit"><i data-feather="far fa-circle"></i>Benefit</a>
                </li> --}}
            </ul>
        </li>
        <li
            class="{{ $page === 'About' ? 'active-page' : '' }} {{ $page === 'Journey' ? 'active-page' : '' }} {{ $page === 'Team' ? 'active-page' : '' }} {{ $page === 'Partner' ? 'active-page' : '' }}">
            <a href="#"><i data-feather="help-circle"></i>About Page<i
                    class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul>
                <li><a href="/admin/about" class="{{ $page === 'About' ? 'active' : '' }}"><i
                            class="far fa-circle"></i>About Page</a></li>
                <li><a href="/admin/team" class="{{ $page === 'Team' ? 'active' : '' }}"><i
                            class="far fa-circle"></i>Our Team</a></li>
                <li><a href="/admin/partner" class="{{ $page === 'Partner' ? 'active' : '' }}"><i
                            class="far fa-circle"></i>Our Partner</a></li>
                <li><a href="/admin/journey" class="{{ $page === 'Journey' ? 'active' : '' }}"><i
                            class="far fa-circle"></i>Journey</a></li>
                {{-- <li class="{{ $page === 'Benefit' ? 'active' : '' }}">
                    <a href="/admin/benefit"><i data-feather="far fa-circle"></i>Benefit</a>
                </li> --}}
            </ul>
        </li>
        <li class="{{ $page === 'Product' ? 'active-page' : '' }}">
            <a href="/admin/product"><i data-feather="package"></i>Products</a>
        </li>

        <li
            class="{{ $page === 'Opportunity Reason' ? 'active-page' : '' }} {{ $page === 'Opportunity Image' ? 'active-page' : '' }}">
            <a href="#"><i data-feather="dollar-sign"></i>Opportunities<i
                    class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul>
                <li><a href="/admin/opportunity_image" class="{{ $page === 'Opportunity Image' ? 'active' : '' }}"><i
                            class="far fa-circle"></i>Image</a></li>
                <li><a href="/admin/opportunity_reason" class="{{ $page === 'Opportunity Reason' ? 'active' : '' }}"><i
                            class="far fa-circle"></i>Reason</a></li>
            </ul>
        </li>

        <li class="{{ $page === 'Contact' ? 'active-page' : '' }}">
            <a href="/admin/contact"><i data-feather="phone"></i>Contact Page</a>
        </li>
        <li class="{{ $page === 'Article' ? 'active-page' : '' }} {{ $page === 'categories' ? 'active-page' : '' }}">
            <a href="#"><i data-feather="align-center"></i>Article<i
                    class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul>
                <li><a href="/admin/article" class="{{ $page === 'Article' ? 'active' : '' }}"><i
                            class="far fa-circle"></i>Article</a></li>
                <li><a href="/admin/categories" class="{{ $page === 'categories' ? 'active' : '' }}"><i
                            class="far fa-circle"></i>Categories</a></li>
            </ul>
        </li>
        <li class="{{ $page === 'Message' ? 'active-page' : '' }}">
            <a href="/admin/message"><i data-feather="mail"></i>Message</a>
        </li>



    </ul>
</div>
