<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Food Point</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color:   #000000 !important;
                color: #d0ac00 !important;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
                color: #d0ac00;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 40px;
            }

            .links > a {
                color: #d0ac00;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 20px;
            }

            .content{
                transform-style: preserve-3d;
                perspective: 300px;
                /*animation: changeLetter 3s linear infinite alternate;*/
            }

            /* @keyframes float{*/
            /*   0%{transform: translate(-10%, -10%);  }*/
            /*   50%{transform: translate(-10%, 10%);  }*/
            /*   100%{transform: translate(-10%, -10%);  }*/
            /*} */
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/index') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))

                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="links">
                <img src="https://aurages.com/rest/images/Logo_Food.png" style="
    width: 400px;
    height: 500px;
">
                </div>
            </div>
        </div>
    </body>
</html>
