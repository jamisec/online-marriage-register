<!DOCTYPE html>
<html lang="en">
    @include('super_admin.includes.header')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('super_admin.includes.navBar')
        @include('super_admin.includes.sideBar')
        @yield('super_content')
    </div>
    @include('super_admin.includes.footer')
</body>
</html>