<div class="page-sidebar">
    <ul class="list-unstyled accordion-menu">
        <li class="{{ $page === 'Dashboard' ? 'active-page' : '' }}">
            <a href="/"><i data-feather="airplay"></i>Dashboard</a>
        </li>

        {{-- BENDAHARA PAGE?? --}}
        <li class="{{ $page === 'Uang Kas' ? 'active-page' : '' }}">
            <a href="/uangkas"><i data-feather="dollar-sign"></i>Uang Kas</a>
        </li>
        {{-- BENDAHARA PAGE?? --}}

        <li class="{{ $page === 'Pengeluaran' ? 'active-page' : '' }}">
            <a href="/pengeluaran"><i data-feather="credit-card"></i>Pengeluaran</a>
        </li>

        <li class="{{ $page === 'Laporan' ? 'active-page' : '' }}">
            <a href="/laporan"><i data-feather="file"></i>Laporan</a>
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

        {{-- BENDAHARA PAGES --}}
        <li
            class="{{ $page === 'Kelas Bendahara' ? 'active-page' : '' }} ">
            <a href="#"><i data-feather="briefcase"></i>Bendahara<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul>
                <li><a href="/bendahara/kelas" class="{{ $page === 'Kelas Bendahara' ? 'active' : '' }}"><i
                            class="far fa-square"></i>Kelas</a></li>
            </ul>
        </li>
        {{-- BENDAHARA PAGES --}}
    </ul>
</div>
