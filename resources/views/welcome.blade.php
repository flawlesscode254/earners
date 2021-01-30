<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>e-earners</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: lightblue;
                color: #636b6f;
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
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: white;
                padding: 30px;

            }

            .nav{
                background-color: skyblue;
                padding: 5px;
            }

            .links > a {
                color: red;
                padding: 0 300px;
                font-size: 13px;
                font-weight: 200;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links nav">
                    
                        @auth
                                <a href="{{ url('/home') }}">Home</a>
                            @else                              
                                 <a href="{{ route('login') }}">Login</a>                                   
                                
                            @if (Route::has('register'))
                                                      
                                <a href="{{ route('register') }}">Register</a>
                                                                 
                                @endif
                        @endauth
                    
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                     E-EARNERS                        
                </div>

                <div class="links nav">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://twitter.com/ndiecodes">Twitter</a>
                    <a href="https://github.com/ndiecodes">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
