<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
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
            <div class="content">
                <div class="title m-b-md">
                    Time & Attendance System
                </div>

                <div class="links">
                    <a href="{{url('/admin')}}">ADMIN</a>
                    @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ url('/timelist') }}">TimeList</a>
                        <!-- <a href="{{ url('personaltimelist/{id}') }}">PersonalTimeList</a> -->
                        <!-- @if (Route::has('register')) -->
                            <!-- @can('admin-higher')
                                <a href="{{ route('register') }}">Register</a>
                            @endcan -->
                        <!-- @endif -->
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif -->
                    @endauth
                </div>
                @endif
            </div>
            <div class="top-right links">
                <a href="https://docs.google.com/spreadsheets/d/1qgb6KbSpUkDCpKv5se3BpoUkikO5_mSAOKksk3Jvv64/edit#gid=1014676512">シフトの</a>
                <a href="https://docs.google.com/spreadsheets/d/12Jigmn7w7_NZY-f6Ob-LRY4ytIfYjrCic43un-xGilg/edit#gid=1744094400">面談の</a>
                <a href="https://drive.google.com/drive/u/0/folders/1HOIOsiycTuGM58CGFmFtV7FQwriWoo2b">フォルダ</a>
            <div>
        </div>
    </body>
</html>


