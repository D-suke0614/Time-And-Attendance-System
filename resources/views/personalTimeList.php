<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">日付</th>
      <th scope="col">出勤時間</th>
      <th scope="col">退勤時間</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($times as $time)
    <tr>
      <td scope="row">{{ $time->start_time }}</td>
      <td>{{ $time->start_time }}</td>
      <td>{{ $time->end_time }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>