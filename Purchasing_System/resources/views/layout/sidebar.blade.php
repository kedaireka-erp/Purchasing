<!doctype html>
<html lang="en">

<head>
    <x-style></x-style>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <x-sidebar></x-sidebar>
        <div id="content">
            <x-navbar></x-navbar>
            <div class="container">
                @yield('Judul-content')
                <hr>
                @yield('content')
            </div>
        </div>
    </div>
    <x-script></x-script>
</body>

</html>
