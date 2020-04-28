@extends('layouts.app')
@section('content')

<!DOCTYPE HTML>
<html>
<head>
    <title>掲示板</title>
</head>
<body>

<h1>自分だけのアレンジ表を完成させよう!!</h1>
<br>
<h3>オープンアウト入力説明</h3>
<br>
<p>①スコアは任意の数字を入力</p>
<p>②スコアに対して1投目~3投目を数字で入力（bullの場合は50と入力）</p>
<p>③メモが必要な場合はアレンジメモに記述</p>


<form action="openout" method="POST">
{{ csrf_field() }}

    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"><br><br>

    スコア<br>
    <input name="arrangenumber">
    <br>
    １投目<br>
    <input name="arrangefirst">
    <br>
    ２投目<br>
    <input name="arrangesecond">
    <br>
    ３投目<br>
    <input name="arrangethird">
    <br>
    アレンジメモ<br>
    <textarea name="arrangememo" rows="4" cols="40"></textarea>
    <br>
    <button class="btn btn-success"> 送信 </button>
</form>
{{ csrf_field() }}
<br><hr>

<table class ="table">
    <thead>
        <tr>
        <th scope="col">スコア</th>
        <th scope="col">1投目</th>
        <th scope="col">2投目</th>
        <th scope="col">3投目</th>
        <th scope="col">詳細</th>
        </tr>
    </thead>
    <tbody>
        @foreach($openout as $d)
            @if($authUser->id === $d->user_id)
                <tr>
                <th>{{ $d->arrangenumber }}</th>
                <td>{{ $d->arrangefirst }}</td>
                <td>{{ $d->arrangesecond }}</td>
                <td>{{ $d->arrangethird }}</td>
                <td><a href="{{ url('openout/show', ['id' => $d->id ]) }}" class="btn btn-info" >詳細</a></td>
            </tr>
            @endif
        @endforeach
</tbody>
</table>
<br><hr>

{{ $openout->render() }}

</body>
</html>

@endsection
