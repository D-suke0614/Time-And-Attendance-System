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

  <div class="search_form_wrapper">
    <form action="{{ route('timelist.searchPersonal') }}" method = "POST" class="search_form">
    @csrf
      <select class="" aria-label="" name="year">
        <option value="2021" selected>{{$year}}</option>
        @for ($i = 2021; $i <= $year+3; $i++)
          <option value={{$i}}>
            {{$i}}
          </option>
        @endfor
      </select>
      <span class="search_form_text">年</span>
      <select class="" aria-label="" name="month">
        <option selected>{{$month}}</option>
        @for ($i = 1; $i <= 12; $i++)
          <option value={{$i}}>
            {{$i}}
          </option>
        @endfor
      </select>
      <span class="search_form_text">月</span>
      <div>
        <button type="submit"  class="btn btn-secondary">検索</button>
      </div>
    </form>
  </div>

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
        @foreach ($times as $time)
        <tr>
          <td scope="row">{{ $time->start_time->format('Y/m/d') }}</td>
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
    <p class="footer">Seed Box © 2021 - </p>
  </footer>

</body>
</html>
