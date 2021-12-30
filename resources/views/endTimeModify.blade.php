<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>退勤時間修正</title>
</head>
<body>
    <form action="{{ route('end.update',['id' =>$endtime_id['id']]) }}" method="post">
        @csrf
        @method('put')
        <label for="">申請日時</label>
        <p><?php echo date('Y年m月d日') ?></p>
        <label>名前</label>
        <p>{{ Auth::user()->name}}</p>
        <label>退勤時間</label>
        <p>
            <?php
                //表示用時間
                $time_data = date('Y年m月d日 H:i', strtotime( $endtime_id->end_time ));
                echo $time_data;
                //value用時間
                // $time_value = date('Y-n-jH:i', strtotime( $starttime_id->start_time ));
                // $time_data3 = substr_replace($time_value, 'T', 10, 0);
                
                $time_value = substr_replace(date('Y-m-dH:i', strtotime( $endtime_id->end_time )), 'T', 10, 0);
            ?>
        </p>
        <label>退勤修正時間</label>
        <p><input type="datetime-local" name="end_time" value=<?= $time_value ?>  required></p>
        <button type="submit" value="登録">登録</button>
    </form>
</body>
</html>