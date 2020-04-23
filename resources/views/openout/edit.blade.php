@extends('layouts.app')
@section('content')

<!DOCTYPE HTML>
<html>
<head>
    <title>掲示板</title>
</head>
<body>

<h1>更新画面</h1>

{{ $openout->arrangenumber }}
{{ $openout->arrangefirst }}
{{ $openout->arrangesecond }}
{{ $openout->arrangethird }}
{{ $openout->arrangememo }}



<form method="POST" action="{{ url('openout/update', ['id' => $openout->id ]) }}">
{{ csrf_field() }}
<input type="hidden" name="arrangeid" value="{{ Auth::user()->id }}"><br><br>

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
