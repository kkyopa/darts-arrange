@extends('layouts.app')
@section('content')


<!DOCTYPE HTML>
<html>
<head>
    <title>掲示板</title>
</head>
<body>

<h1>詳細</h1>

{{ $openout->id }}
{{ $openout->arrangenumber }}
{{ $openout->arrangefirst }}
{{ $openout->arrangesecond }}
{{ $openout->arrangethird }}
{{ $openout->arrangememo }}



</body>
</html>
@endsection
