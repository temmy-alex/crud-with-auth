@include('layouts.include.head')
<!-- Sidebar -->
@include('layouts.include.sidebar')
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        @include('layouts.include.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container">

            <!-- Page Heading -->
            {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> --}}
                @yield('content')
            {{-- </div> --}}
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    @include('layouts.include.footer')
    <!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->

@include('layouts.include.script')
