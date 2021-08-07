<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('./assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/stamp.css') }}">
    <script src="{{ asset('./assets/js/stamp.js') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <title>Seed Box Stamp</title>
</head>

{{-- 全画面共通のcssはapp.cssへ記載 --}}

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
            <a class="links" target="_blank" href="{{ url('/timelist') }}">
                TimeList
            </a>
        <div>
    </header>

    <main>
        <h1 class="title">
            打刻画面
        </h1>
        <div class="container">
            <button class="stamp" onclick="checkWorkStart()">勤務するよー</button>
            <button class="stamp" onclick="checkWorkEnd()">今日は終わり</button>
            <form action="{{ route('stamp.store') }}" method="POST">
                @csrf
                <button id="startWork" type="submit" name="start" value="勤務開始" class="hiddenStamp"></button>
                <button id="endWork" type="submit" name="end" value="勤務終了" class="hiddenStamp"></button>
            </form>
        </div>
    </main>

    <footer>
        <p class="copy_right">Seed Box © 2021 - </p>
    </footer>

</body>
</html>
