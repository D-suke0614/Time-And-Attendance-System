<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal TimeList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('./assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/timeline.css') }}">
</head>
<body>
  <header>
    <div class="top-left">
      <img class="logo" src="{{ asset('./assets/img/logo.png') }}">
      <h1>
          Seed Box
      </h1>
    </div>
    <div class="top-right">
      <h3>{{ $user->name }}</h3>
    </div>
  </header>

  {{-- 変更完了アラート --}}
  @if (session('flash_message'))
  <div class="flash_message">
      {{ session('flash_message') }}
  </div>
  @endif

  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">日付</th>
          <th scope="col">出勤時間</th>
          <th scope="col">退勤時間</th>
          <th scope="col">勤務時間</th>
        </tr>
      </thead>
      <tbody>
        {{-- <form action="{{ route('startTimeModify', $time->id) }}"> --}}
        @foreach ($times as $time)
        <tr>
          <td scope="row">{{ $time->start_time->format('Y/m/d') }}</td>
          <td>
            {{ $time->start_time->format('H:i:s') }}
            <a href="{{ route('start.show', $time->id) }}">
              更新する
            </a>
          </td>
          @if($time->end_time == null)
            <td>退勤記録なし</td>
          @else
            <td>{{ $time->end_time->format('H:i:s') }}
            <a href="{{ route('end.show', $time->id) }}">
              更新する
            </a>
            </td>
          @endif
          <td>{{ $time->work_time }}</td>
        </tr>
        @endforeach
        {{-- </form> --}}
      </tbody>
    </table>
  </div>

  <footer>
    <p class="footer">Seed Box © 2021 - </p>
  </footer>

</body>
</html>
