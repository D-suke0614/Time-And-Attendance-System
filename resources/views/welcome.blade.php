<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Seed Box</title>
        <link rel="stylesheet" href="{{ asset('./assets/css/app.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                margin-top: 13vw;
                position: relative;
            }


            .content {
                text-align: center;
            }

            .title {
                font-size: 100px;
            }

            .auth_btn > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 30px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 50px;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="top-left">
                <h1>
                    Seed Box
                </h1>
            </div>
            <div class="top-right">
                <a class="links" target="_blank" href="https://docs.google.com/spreadsheets/d/1qgb6KbSpUkDCpKv5se3BpoUkikO5_mSAOKksk3Jvv64/edit#gid=1014676512">
                    Work Schedule
                </a>
                <a class="links" target="_blank" href="https://docs.google.com/spreadsheets/d/12Jigmn7w7_NZY-f6Ob-LRY4ytIfYjrCic43un-xGilg/edit#gid=1744094400">
                    Interview Sheet
                </a>
                <a class="links" target="_blank" href="https://drive.google.com/drive/u/0/folders/1HOIOsiycTuGM58CGFmFtV7FQwriWoo2b">
                    Google Drive
                </a>
            <div>
        </header>

        <main>
            <div class="flex-center position-ref">
                <div class="content">
                    <div class="title m-b-md">
                        Seed Box
                    </div>
                    <div class="auth_btn">
                        {{-- <a href="{{url('/admin')}}">ADMIN</a> --}}
                        @if (Route::has('login'))
                        @auth
                            <!-- <a href="{{ route('register') }}">Register</a> -->
                            <a class="links" href="{{ url('/stamp') }}">Stamp</a>
                            <a class="links" target="_blank" href="{{ url('/timelist') }}">TimeList</a>
                        @else
                            <a class="links" href="{{ route('login') }}">Login</a>

                            <!-- @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif -->
                        @endauth
                        @can('admin-higher')
                            <a href="{{ route('register') }}">Register</a>
                        @endcan
                    </div>
                    @endif
                </div>
            </div>
        </main>
        <footer>
            <p class="copy_right">Seed Box © 2021 - </p>
        </footer>

    </body>
</html>
