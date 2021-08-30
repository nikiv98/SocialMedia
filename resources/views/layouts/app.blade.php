<!DOCTYPE html>
<html lang="en">
<head>
   @include('layouts.head')
</head>
<body>
    <header>
          @include('layouts.header')
    </header>

    @yield('content')

    <footer>
        @include('layouts.footer')
    </footer>

</body>
</html>