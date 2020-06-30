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
                <td>{{ $perfect->arrangenumber }}</td>
            </tr>
            <tr>
                <th scope="col">1投目</th>
                <td>{{ $perfect->arrangefirst }}</td>
            </tr>
            <tr>
                <th scope="col">2投目</th>
                <td>{{ $perfect->arrangesecond }}</td>
            </tr>
            <tr>
                <th scope="col">3投目</th>
                <td>{{ $perfect->arrangethird }}</td>
            </tr>

            <tr>
                <th scope="col">アレンジメモ</th>
                <td>{{ $perfect->arrangememo }}</td>
            </tr>
        </tbody>
    </table>


    <form method="GET" action="{{url('perfect/edit', ['id' => $perfect->id ])}}">
        {{ csrf_field() }}
        <input class="btn btn-info" type="submit" value="変更する">
    </form>
    <br>
    <form method="POST" action="{{url('perfect/destroy', ['id' => $perfect->id ])}}">
        {{ csrf_field() }}
        <input type="submit" value="削除する" class="btn btn-danger" onclick='return confirm("本当に削除しますか?");'>
    </form>

</body>

</html>
@endsection