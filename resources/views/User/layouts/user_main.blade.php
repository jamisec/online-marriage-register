<!doctype html>
<html class="no-js" lang="zxx">
@include('User.partials.header')
<body>
	<div class="wrapper" id="wrapper">
            @include('User.partials.nav')
            @include('User.pages.slider')
            @include('User.pages.about')
            @include('User.partials.footer')
    </div>
    @include('User.partials.footerjs')	
</body>
</html>