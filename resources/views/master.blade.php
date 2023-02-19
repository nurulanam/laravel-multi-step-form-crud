<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.meta')
    @yield('extraCss')
    @include('includes.head')

</head>


<body>
    @yield('content')

    @yield('extraJS')
    @include('includes.scripts')

</body>

</html>
