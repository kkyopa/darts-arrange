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
<h3>パーフェクト編入力説明</h3>
<br>
<p>①スコアは任意の数字を入力</p>
<p>②スコアを入力する際、最初の文字は「TかDかSの大文字を選択し入力した上で大文字の数字（１~２０）を入力してください（BULLの場合はSBULL又はDBULLと入力）</p>
<p>③メモが必要な場合はアレンジメモに記述</p>
<p>④アレンジメモを確認したい、アレンジの変更、削除は詳細ボタンで変更できます。</p>
<p>⑤３投目はダブル（D）かDBULLを入力してください</p>
<br>
<p>例:</p>

<input name="ex_arrangenumber" value="１２７">
スコア<br>
<input name="ex_arrangefirst" value="T２０">
１投目<br>
<input name="ex_arrangesecond" value="S１７">
２投目<br>
<input name="ex_arrangethird" value="DBULL">
３投目<br>
<textarea name="ex_arrangememo" rows="4" cols="40" value="まずはBULLから!!"></textarea>
アレンジメモ<br><br><br>


<h3>さっそく登録してみよう</h3>

@if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="perfect" method="POST">
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
        @foreach($perfect as $d)
            @if($authUser->id === $d->user_id)
                <tr>
                <th>{{ $d->arrangenumber }}</th>
                <td>{{ $d->arrangefirst }}</td>
                <td>{{ $d->arrangesecond }}</td>
                <td>{{ $d->arrangethird }}</td>
                <td><a href="{{ url('perfect/show', ['id' => $d->id ]) }}" class="btn btn-info" >詳細</a></td>
            </tr>
            @endif
        @endforeach
</tbody>
</table>



</body>
</html>

@endsection