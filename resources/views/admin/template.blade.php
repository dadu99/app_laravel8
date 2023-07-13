@include('admin.partials.head')

    <body class="sb-nav-fixed">
        @include("admin.partials.topbar")
        <div id="layoutSidenav">
            @include('admin.partials.sidenav')
        
            @yield('content-users')
        </div>
       @include('admin.partials.scripts')
    </body>
</html>



