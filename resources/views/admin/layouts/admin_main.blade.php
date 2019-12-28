<!DOCTYPE html>
<html lang="en">
    @include('admin.includes.header')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.includes.navBar')
        @include('admin.includes.sideBar')
        {{-- @include('admin.includes.page_content') --}}
        @yield('main_content')
    </div>
    @include('admin.includes.footer')
</body>
</html>