{{-- Start Nav --}}
@include('frontend.header')
@include('frontend.navigation')

{{-- Start container --}}
@yield('content')
{{-- End container --}}

{{-- Start Footer --}}
@include('frontend.footer')
{{-- End Footer --}}