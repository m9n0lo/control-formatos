<!DOCTYPE html>
<html>

<head>
    @include('layouts.includes.header')
</head>

<body>
    <div class="area">

        <div class="container">

            @yield('content')

        </div>

    </div>
    <nav class="main-menu">
       
        @include('layouts.partials.sidebar')
        
    </nav>



</body>

<footer>
    @include('layouts.includes.footer')
</footer>

</html>
