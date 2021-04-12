<html>
    <head>
        <title>AutoGen - @yield('title')</title>

        <link rel="stylesheet" href="/css/app.css">
        @yield('css')
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ url('/') }}">
                        <h1>AUTOGEN</h1>
                    </a>
                </div>
                <div class="col-md-8 align-self-center">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('/') }}">
                                <p>Databases</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            @yield('content')
        </div>

        <script src="/js/app.js"></script>
        @yield('js')
    </body>
</html>