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
            <form action="{{ route('stamp.store') }}" method="POST">
                @csrf
                <input type="hidden" id="time" name="time">
                <button type="submit" value="勤務開始" id="stamp" onclick="time()">勤務開始</button>
                <input type="date">
                <input type="time">
            </form>
        </div>
    </main>

    <footer>
    </footer>

</body>
</html>
