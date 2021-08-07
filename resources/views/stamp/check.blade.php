<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>check</title>
  <script src="{{ asset('./assets/js/check.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('./assets/css/stamp.js') }}">
</head>
<body>
  <form action="{{ route('stamp.check') }}" method="POST">
    @csrf
    <button id="startWork" type="submit" name="start" value="勤務開始" class="hiddenStamp" onclick="workStart()"></button>
    <button id="noRecord" type="submit" name="notRecord" class="hiddenStamp" onclick="workStart()"></button>
  </form>

</body>
</html>
