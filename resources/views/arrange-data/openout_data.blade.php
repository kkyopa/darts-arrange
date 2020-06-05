@extends('layouts.app')
@section('content')

<!DOCTYPE HTML>
<html>
<head>
    <title>掲示板</title>
</head>
<body>

<h1>アレンジデータオープンアウト編</h1>
<br>
<h3>オープンアウト説明</h3>
<br>
<p>①検索したいスコアとフライトを選択</p>
<p>②検索をクリックすると条件にあったものが表示されます!!</p>
<br>


<h1>検索</h1>
<br>
<form method="GET" action="{{ url('../arrange-data/openout_data') }}" class="form-inline my-2 my-lg-0">
    <h5>スコア</h5>
    <p><input type="text" class="form-control mr-sm-2" name="keyword" value="{{$keyword}}"></p>
    <p><input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="検索"></p>
</form>


<table class ="table">
    <thead>
        <tr>
        <th scope="col">スコア (件数)</th>
        <th scope="col">1投目</th>
        <th scope="col">2投目</th>
        <th scope="col">3投目</th>
        <th scope="col">詳細</th>
        </tr>
    </thead>
    <tbody>
    @if($openout->count())
        @foreach($openout as $d)
                <tr>
                <th>{{ $d->arrangenumber }}({{ $d->count}})</th>
                <td>{{ $d->arrangefirst }}</td>
                <td>{{ $d->arrangesecond }}</td>
                <td>{{ $d->arrangethird }}</td>
                <td><a href="{{ url('openout/show', ['id' => $d->id ]) }}" class="btn btn-info" >詳細</a></td>
            </tr>
        @endforeach
        @else
            <p>見つかりませんでした。</p>
        @endif
</tbody>
</table>
<br><hr>

{{ $openout->render() }}

</body>
</html>

@endsection
