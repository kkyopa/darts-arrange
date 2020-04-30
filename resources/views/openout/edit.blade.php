@extends('layouts.app')
@section('content')

<!DOCTYPE HTML>
<html>
<head>
    <title>掲示板</title>
</head>
<body>

<h1>更新画面</h1>
スコア
{{ $openout->arrangenumber }}
<br>
1投目
{{ $openout->arrangefirst }}
<br>
2投目
{{ $openout->arrangesecond }}
<br>
3投目
{{ $openout->arrangethird }}
<br>
メモ
{{ $openout->arrangememo }}



<form method="POST" action="{{ url('openout/update', ['id' => $openout->id ]) }}">
{{ csrf_field() }}
<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"><br><br>

    アレンジナンバー<br>
    <input name="arrangenumber" value="{{ $openout->arrangenumber }}">
    <br>
    １投目<br>
    <input name="arrangefirst" value="{{ $openout->arrangefirst }}">
    <br>
    ２投目<br>
    <input name="arrangesecond" value="{{ $openout->arrangesecond }}">
    <br>
    ３投目<br>
    <input name="arrangethird" value="{{ $openout->arrangethird }}">
    <br>
    アレンジメモ:<br>
    <textarea name="arrangememo" rows="4" cols="40" value="{{ $openout->arrangememo }}" ></textarea>
    <br>
    <button class="btn btn-success"> 送信 </button>
</form>
{{ csrf_field() }}
<br><hr>


</body>
</html>
@endsection
