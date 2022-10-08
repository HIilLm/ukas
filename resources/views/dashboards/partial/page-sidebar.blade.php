<div class="page-sidebar">
    <ul class="list-unstyled accordion-menu">
        <li class="{{ $page === 'Dashboard' ? 'active-page' : '' }}">
            <a href="/"><i data-feather="airplay"></i>Dashboard</a>
        </li>
        <li class="{{ $page === 'Uang Kas' ? 'active-page' : '' }}">
            <a href="/uangkas"><i data-feather="dollar-sign"></i>Uang Kas</a>
        </li>

        {{-- ADMIN PAGES --}}
        <li
            class="{{ $page === 'Setting' ? 'active-page' : '' }} {{ $page === 'Kelas' ? 'active-page' : '' }} {{ $page === 'categories' ? 'active-page' : '' }} {{ $page === 'Page' ? 'active-page' : '' }}">
            <a href="#"><i data-feather="settings"></i>Admin<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul>
                <li><a href="/admin/kelas" class="{{ $page === 'Kelas' ? 'active' : '' }}"><i
                            class="far fa-square"></i>Kelas</a></li>
                {{-- <li><a href="/admin/categories" class="{{ $page === 'categories' ? 'active' : '' }}"><i
                            class="far fa-square"></i>Categories</a></li> --}}
            </ul>
        </li>
        {{-- ADMIN PAGES --}}
    </ul>
</div>
