@include('admin.partials.head')

    <body class="sb-nav-fixed">
        @include('admin.partials.topbar')
        <div id="layoutSidenav">
            @include('admin.partials.sidenav')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content-users')
                    <!-- for user blade page-->
                    @yield('content')
                    <!-- for control panel balde page-->
                </main>
                @include('admin.partials.footer')
            </div>
        </div>
        @include('admin.partials.scripts')
    </body>
</html>
