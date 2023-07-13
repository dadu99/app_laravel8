@include('admin.partials.head')

    <body class="wrapper">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
             @yield('content')
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;  | Powered by Darius Baciu</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
@include('admin.partials.scripts')
