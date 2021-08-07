<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('./assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/stamp.css') }}">
    <script src="{{ asset('./assets/js/stamp.js') }}"></script>
    <title>Stamp</title>
</head>

{{-- 全画面共通のcssはapp.cssへ記載 --}}

<body>
    <header>
        <h1 class="title">打刻画面</h1>
    </header>

    <main>
        <div class="container">
            <button class="stamp" onclick="checkWorkStart()">勤務するよー</button>
            <button class="stamp" onclick="checkWorkEnd()">今日は終わり</button>
            <form action="{{ route('stamp.store') }}" method="POST">
                @csrf
                <button id="startWork" type="submit" name="start" value="勤務開始" class="hiddenStamp" onclick="workStart()"></button>
                <button id="endWork" type="submit" name="end" value="勤務終了" class="hiddenStamp"></button>
            </form>
        </div>
    </main>

    <footer>
    </footer>

</body>
</html>
