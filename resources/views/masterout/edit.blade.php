@extends('layouts.app')
@section('content')

<!DOCTYPE HTML>
<html>
<head>
    <title>掲示板</title>
</head>
<body>
<h1>更新画面</h1>

<h3>オープンアウト入力説明</h3>
<br>
<p>①スコアは任意の数字を入力</p>
<p>②スコアを入力する際、最初の文字は「TかDかSの大文字を選択し入力した上で大文字の数字（１~２０）を入力してください（BULLの場合はBULLと入力）</p>
<p>③メモが必要な場合はアレンジメモに記述</p>
<p>④アレンジメモを確認したい、アレンジの変更、削除は詳細ボタンで変更できます。</p>
<br>


<p>変更前のアレンジ:</p>
<input name="ex_arrangenumber" value="{{ $masterout->arrangenumber }}">
スコア<br>
<input name="ex_arrangefirst" value="{{ $masterout->arrangefirst }}">
１投目<br>
<input name="ex_arrangesecond" value="{{ $masterout->arrangesecond }}">
２投目<br>
<input name="ex_arrangethird" value="{{ $masterout->arrangethird }}">
３投目<br>
<textarea name="ex_arrangememo" rows="4" cols="40">{{ $masterout->arrangememo }}</textarea>
アレンジメモ<br><br><br>


@if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ url('masterout/update', ['id' => $masterout->id ]) }}">
{{ csrf_field() }}
<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"><br><br>

    アレンジナンバー<br>
    <input name="arrangenumber" value="{{ $masterout->arrangenumber }}">
    <br>
    １投目<br>
    <input name="arrangefirst" value="{{ $masterout->arrangefirst }}">
    <br>
    ２投目<br>
    <input name="arrangesecond" value="{{ $masterout->arrangesecond }}">
    <br>
    ３投目<br>
    <input name="arrangethird" value="{{ $masterout->arrangethird }}">
    <br>
    アレンジメモ:<br>
    <textarea name="arrangememo" rows="4" cols="40" value="{{ $masterout->arrangememo }}" ></textarea>
    <br>
    <button class="btn btn-success"> 送信 </button>
</form>
{{ csrf_field() }}
<br><hr>


</body>
</html>
@endsection
