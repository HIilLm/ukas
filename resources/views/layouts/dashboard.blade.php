<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <style>
        .imgpno:hover {
            background-color: white !important;
        }

        .imgpno {
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
    <!-- Title -->
    <title>Uang Kas - {{ $page }}</title>

    {{-- Icon Image for Web Icon --}}
    <link rel="shortcut icon" href="{{ asset('smkn1.ico') }}">
    {{-- Icon Image for Web Icon --}}

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('/css/customcss.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Theme Styles -->
    <link href="{{ asset('/assets/css/main.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('/assets/css/dark-theme.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('/assets/css/custom.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}" />

    {{-- Plugins stuff --}}
    <script src="{{ asset('/assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.2/viewer.min.css"
    integrity="sha512-r+5gXtPk5M2lBWiI+/ITUncUNNO15gvjjVNVadv9qSd3/dsFZdpYuVu4O2yELRwSZcxlsPKOrMaC7Ug3+rbOXw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.2/viewer.js"
    integrity="sha512-taR40V17AK2+3RjqzCYkczb0/hTHuQCid0kBs0I2g6DqkFjkTcAIpsa+4PzGuWcRica2AOZQmz4pNPj4InFR8A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    @yield('css')
</head>

<body>
    {{-- <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div> --}}

    <div class="page-container">
        {{-- PAGE HEADER --}}
        @include('dashboards.partial.page-header')

        {{-- PAGE SIDEBAR --}}
        @include('dashboards.partial.page-sidebar')

        @yield('content')

    </div>

    <!-- Javascripts -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{ asset('/assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/main.min.js') }}"></script>
    <script src="{{ asset('/assets/js/pages/dashboard.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="{{ asset('js/reorder.js') }}"></script>
    <script src="{{ asset('/assets/js/pages/datatables.js') }}"></script>
    <script src="{{ asset('/assets/plugins/DataTables/datatables.min.js') }}"></script>

    @yield('js')
    <script>
        function what(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-delete' + id).submit();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
        function whatupdate() {
            Swal.fire({
                title: 'confirm update?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-update').submit();
                    Swal.fire(
                        'updated!',
                        'Your data has been updated.',
                        'success'
                    )
                }
            })
        }
        function image() {
            const viewer = new Viewer(document.getElementById('images'), {
                viewed() {
                    viewer.zoomTo(1);
                },
            });
        }
        function out() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#logout-form').submit();
                }
            })
        }
    </script>
</body>

</html>
