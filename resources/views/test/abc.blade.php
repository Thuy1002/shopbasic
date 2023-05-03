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
            <td>Tên Sinh viên </td>
           <td>Ngày sinh</td>
           <td>Ngành học</td>
           
        </tr>
        @foreach ($abc as $test)
        <tr>
            <td>{{$test->id}}</td>
            <td>{{$test->ten_sv}}</td>
            <td>{{$test->ngay_sinh}}</td>
            <td>{{$test->nganh_hoc}}</td>
            
        
        </tr>
        @endforeach
       
    
    </table>
</body>
</html>