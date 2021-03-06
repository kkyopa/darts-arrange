@extends('layouts.app')
@section('content')

<!DOCTYPE HTML>
<html>

<head>
    <title>dartsArrange</title>
</head>

<body>

    <h3>詳細画面</h3>

    <table class="table">
        <thead>
        </thead>
        <tbody>
            <tr>
                <th scope="col">スコア</th>
                <td>{{ $openout->arrangenumber }}</td>
            </tr>
            <tr>
                <th scope="col">1投目</th>
                <td>{{ $openout->arrangefirst }}</td>
            </tr>
            <tr>
                <th scope="col">2投目</th>
                <td>{{ $openout->arrangesecond }}</td>
            </tr>
            <tr>
                <th scope="col">3投目</th>
                <td>{{ $openout->arrangethird }}</td>
            </tr>

            <tr>
                <th scope="col">アレンジメモ</th>
                <td>{{ $openout->arrangememo }}</td>
            </tr>
        </tbody>
    </table>


    <form method="GET" action="{{url('openout/edit', ['id' => $openout->id ])}}">
        {{ csrf_field() }}
        <input class="btn btn-info" type="submit" value="変更する">
    </form>
    <br>
    <form method="POST" action="{{url('openout/destroy', ['id' => $openout->id ])}}">
        {{ csrf_field() }}
        <input type="submit" value="削除する" class="btn btn-danger" onclick='return confirm("本当に削除しますか?");'>
    </form>

</body>

</html>
@endsection