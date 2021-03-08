@include('templates.header')
{{-- this is the header and menu --}}
@include('templates.menu')

@yield('content')

{{-- this is footer  --}}
@include('templates.footer')