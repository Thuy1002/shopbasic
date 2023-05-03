<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>id</td>
            <td>tên giảng viên </td>
           <td>ngày giảng dạy</td>
           
        </tr>
        @foreach ($tests as $test)
        <tr>
            <td>{{$test->id}}</td>
            <td>{{$test->ten_priceng_vien}}</td>
            <td>{{$test->ngay_priceng_day}}</td>
            
        
        </tr>
        @endforeach
       
    
    </table>
    
</body>
</html>