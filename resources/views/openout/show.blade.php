@extends('layouts.app')
@section('content')

<!DOCTYPE HTML>
<html>
<head>
    <title>掲示板</title>
</head>
<body>

<h1>詳細画面</h1>

{{ $openout->arrangenumber }}
{{ $openout->arrangefirst }}
{{ $openout->arrangesecond }}
{{ $openout->arrangethird }}
{{ $openout->arrangememo }}

<form method ="GET" action= "{{url('openout/edit', ['id' => $openout->id ])}}" >
{{ csrf_field() }}
    <input class="btn btn-info" type="submit" value="変更する">
</form>

<form method ="POST" action= "{{url('openout/destroy', ['id' => $openout->id ])}}" >
{{ csrf_field() }}
    <input type="submit" value="削除する" class="btn btn-danger" onclick='return confirm("本当に削除しますか?");'>
</form>

</body>
</html>
@endsection