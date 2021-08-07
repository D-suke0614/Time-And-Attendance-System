<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ secure_asset('./assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('./assets/css/timeline.css') }}">
</head>
<body>
  <header>
    <div class="top-left">
      <h1>
          Seed Tech Mentor
      </h1>
    </div>
    <div class="top-right">
      <a class="links" href="{{ route('timelist.indexPersonal', $user->id) }}">{{ $user->name }}</a>
    </div>
  </header>


  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">日付</th>
          <th scope="col">名前</th>
          <th scope="col">出勤時間</th>
          <th scope="col">退勤時間</th>
          <th scope="col">勤務時間</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($times as $time)
        <tr>
          <td scope="row">{{ $time->start_time->format('Y/m/d') }}</td>
          <td>{{ $time->user->name }}</td>
          <td>{{ $time->start_time->format('H:i:s') }}</td>
          @if($time->end_time == null)
            <td>退勤記録なし</td>
          @else
            <td>{{ $time->end_time->format('H:i:s') }}</td>
          @endif
          <td>{{ $time->work_time }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

<footer>
  <p class="footer">Seed Tech Mentor © 2021 - </p>
</footer>
</body>
</html>
