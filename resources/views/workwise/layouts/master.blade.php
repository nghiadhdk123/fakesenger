<!DOCTYPE html>
<html>
{{-- File Header.blade --}}
@include('workwise.includes.header')
@yield('style')

<body>
    <div class="wrapper">
        {{-- File Navbar.blade --}}
        @include('workwise.includes.navbar')

        {{-- Main Content --}}
        @yield('main-content')
    </div>

    {{-- File Footer --}}
    @include('workwise.includes.footer')
    @yield('script')
</body>

</html>
