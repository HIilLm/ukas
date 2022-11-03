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

        <!-- Title -->
        <title>Circl - Responsive Admin Dashboard Template</title>

        <!-- Styles -->
        <link href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
        <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="../../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">


        <!-- Theme Styles -->
        <link href="{{ asset('/assets/css/main.min.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('/assets/css/dark-theme.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('/assets/css/custom.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="error-page err-404">
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
              <span class='sr-only'>Loading...</span>
            </div>
          </div>
        <div class="container">
            <div class="error-container">
                <div class="error-info">
                    <h1>500</h1>
                    <p>Ooopss... Something went wrong<br>Try refreshing the page</p>
                </div>
                <div class="error-image"></div>
            </div>
        </div>


        <!-- Javascripts -->
        <script src="../../assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="../../assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
        <script src="../../assets/js/main.min.js"></script>
    </body>
</html>
