<!-- SECTION -->
@include('template_blog.head')
<div class="section">
		<!-- container -->
		<div class="container">
        @yield('isi')
        @include('template_blog.widget')
        </div>
</div>
@include('template_blog.footer')