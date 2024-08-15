<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Ekka - Admin Dashboard eCommerce HTML Template.">

    {{-- Title --}}
    @yield('title')
    {{-- Title End --}}

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap"
          rel="stylesheet">

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet"/>

    <!-- PLUGINS CSS STYLE -->
    <link href="/dashboard/adminDashboard/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="/dashboard/adminDashboard/plugins/simplebar/simplebar.css" rel="stylesheet"/>

    <!-- Ekka CSS -->
    <link id="ekka-css" href="/dashboard/adminDashboard/css/ekka.css" rel="stylesheet"/>

    <!-- FAVICON -->
    <link href="/dashboard/adminDashboard/img/favicon.png" rel="shortcut icon"/>

    <!-- Data Tables (user list) -->
    <link href='/dashboard/adminDashboard/plugins/data-tables/datatables.bootstrap5.min.css' rel='stylesheet'>
    <link href='/dashboard/adminDashboard/plugins/data-tables/responsive.datatables.min.css' rel='stylesheet'>


</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

<!--  WRAPPER  -->
<div class="wrapper">

    <!-- LEFT MAIN SIDEBAR -->
    @include('dashboard.layouts.sidebar.left_main_sidebar')

    <!--  PAGE WRAPPER -->
    <div class="ec-page-wrapper">

        <!-- Header start  -->
        @include('dashboard.layouts.header.header')
        <!-- Header End  -->

        {{-- Contents --}}
        @yield('contents')
        {{-- Content End --}}

        <!-- Footer Start -->
        @include('dashboard.layouts.footer.footer')
        <!-- Footer Area End -->

    </div> <!-- End Page Wrapper -->
</div> <!-- End Wrapper -->

<!-- Common Javascript -->
<script src="/dashboard/adminDashboard/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="/dashboard/adminDashboard/js/bootstrap.bundle.min.js"></script>
<script src="/dashboard/adminDashboard/plugins/simplebar/simplebar.min.js"></script>
<script src="/dashboard/adminDashboard/plugins/jquery-zoom/jquery.zoom.min.js"></script>
<script src="/dashboard/adminDashboard/plugins/slick/slick.min.js"></script>

<!-- Chart -->
<script src="/dashboard/adminDashboard/plugins/charts/Chart.min.js"></script>
<script src="/dashboard/adminDashboard/js/chart.js"></script>

<!-- Google map chart -->
<script src="/dashboard/adminDashboard/plugins/charts/google-map-loader.js"></script>
<script src="/dashboard/adminDashboard/plugins/charts/google-map.js"></script>

<!-- Date Range Picker -->
<script src="/dashboard/adminDashboard/plugins/daterangepicker/moment.min.js"></script>
<script src="/dashboard/adminDashboard/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/dashboard/adminDashboard/js/date-range.js"></script>

<!-- Option Switcher -->
<script src="/dashboard/adminDashboard/plugins/options-sidebar/optionswitcher.js"></script>

<!-- Ekka Custom -->
<script src="/dashboard/adminDashboard/js/ekka.js"></script>

<!-- Data Tables (user list) -->
<script src='/dashboard/adminDashboard/plugins/data-tables/jquery.datatables.min.js'></script>
<script src='/dashboard/adminDashboard/plugins/data-tables/datatables.bootstrap5.min.js'></script>
<script src='/dashboard/adminDashboard/plugins/data-tables/datatables.responsive.min.js'></script>

</body>

</html>
