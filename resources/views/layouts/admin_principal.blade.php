<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>IBS ADMIN</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
	 @livewireStyles
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <!-- Header -->
            @include('includes.header')

            <div class="inner">

                <!-- body -->
                <main class="py-2">
                    @yield('contenido')
                </main>
            </div>
        </div>
        <!-- Sidebar -->
        {{-- @include('includes.sidebar') --}}
        @include('includes.btnScrollUp')
    </div>
    @livewireScripts
    <script type="text/javascript">
        window.livewire.on('closeModal', () => {
            $('#exampleModal').modal('hide');
        });
    </script>
    <!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>

<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/transition.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/custom.js"></script>

<script>
    function loadLocation() {
        //inicializamos la funcion y definimos  el tiempo maximo ,las funciones de error y exito.
        navigator.geolocation.getCurrentPosition(viewMap, ViewError, {
            timeout: 1000
        });
    }

    //Funcion de exito
    function viewMap(position) {

        var lon = position.coords.longitude; //guardamos la longitud
        var lat = position.coords.latitude; //guardamos la latitud

        var link = "http://maps.google.com/?ll=" + lat + "," + lon + "&z=14";
        document.getElementById("long").innerHTML = "Longitud: " + lon;
        document.getElementById("latitud").innerHTML = "Latitud: " + lat;

        document.getElementById("link").href = link;

    }



    function ViewError(error) {
        alert(error.code);
    }

    window.onscroll = function() {
        myFunction()
    };

    function myFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 200) {
            document.getElementById("btnScrollToTop").className = "";
        } else {
            document.getElementById("btnScrollToTop").className = "test";
        }
    }
    const btnScrollToTop = document.querySelector("#btnScrollToTop");
    btnScrollToTop.addEventListener("click", function() {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
    });

</script>
</body>

</html>
