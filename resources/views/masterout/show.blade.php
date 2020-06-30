@extends('layouts.app')
@section('content')

<!DOCTYPE HTML>
<html>

<head>
    <title>掲示板</title>
</head>

<body>

    <h3>詳細画面</h3>

    <table class="table">
        <thead>
        </thead>
        <tbody>
            <tr>
                <th scope="col">スコア</th>
                <td>{{ $masterout->arrangenumber }}</td>
            </tr>
            <tr>
                <th scope="col">1投目</th>
                <td>{{ $masterout->arrangefirst }}</td>
            </tr>
            <tr>
                <th scope="col">2投目</th>
                <td>{{ $masterout->arrangesecond }}</td>
            </tr>
            <tr>
                <th scope="col">3投目</th>
                <td>{{ $masterout->arrangethird }}</td>
            </tr>

            <tr>
                <th scope="col">アレンジメモ</th>
                <td>{{ $masterout->arrangememo }}</td>
            </tr>
        </tbody>
    </table>


    <form method="GET" action="{{url('masterout/edit', ['id' => $masterout->id ])}}">
        {{ csrf_field() }}
        <input class="btn btn-info" type="submit" value="変更する">
    </form>
    <br>
    <form method="POST" action="{{url('masterout/destroy', ['id' => $masterout->id ])}}">
        {{ csrf_field() }}
        <input type="submit" value="削除する" class="btn btn-danger" onclick='return confirm("本当に削除しますか?");'>
    </form>

</body>

</html>
@endsection