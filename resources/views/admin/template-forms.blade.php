@include('admin.partials.head')
    <body class="wrapper">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
             @yield('content')
            </div>
            <div id="layoutAuthentication_footer">
                @include('admin.partials.footer')
            </div>
        </div>
@include('admin.partials.scripts')
