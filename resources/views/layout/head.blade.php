<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>Carros</title>
</head>
<body>
    <main role="main">
        @component('component.navbar')
        @endcomponent
        <div class="container">
            @hasSection('body')
                @yield('body')
            @endif    
        </div>

    </main>
    
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    @hasSection('javascript')
        @yield('javascript')
    @endif
</body>
</html>