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
<input class="btn btn-info" type="submit" value="変更する">
</form>

</body>
</html>
@endsection
