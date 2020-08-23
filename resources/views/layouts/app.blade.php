<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')

    <title>@yield('title')</title>

    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>
<body id="page-top">

    <div id="wrapper">
        <!-- SIDEBAR -->
        @include('layouts.modules.sidebar')
        <!-- ENDSIDEBAR -->

        <div id="content-wrapper" class="d-flex flex-column">
            <!-- MAIN CONTENT -->
            <div id="content">
                <div id="main-content">

                    <!-- TOP BAR -->
                    @include('layouts.modules.topbar')
                    <!-- END OF TOP BAR -->

                    <!-- BEGIN PAGE CONTENT -->
                    <div class="container-fluid">
                        <!-- PAGE HEADING -->
                        @yield('content')
                        <!-- END OF PAGE HEADING -->
                    </div>

                </div>
                <!-- END PAGE CONTENT -->
            </div>
            <!-- END OF MAIN CONTENT -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white shadow">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Supervise <script>document.write(new Date().getFullYear());</script></span>
                </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Data Tables -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  
    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

    @yield('js')
    
</body>
</html>