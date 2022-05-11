<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Форма обратной связи">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/alert.css') }}">
        <title>Feedback form</title>
    </head>
    <body class="main antialiased">
        <div class="container container-fluid min-vh-100">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div id="app">
                        <v-header></v-header>
                        <router-view></router-view>
                        <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
                        <v-footer></v-footer>
                    </div>
                </div>
            </div>
        </div>
        <script src="./js/app.js"></script>
    </body>
</html>
