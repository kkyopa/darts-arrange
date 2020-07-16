@extends('layouts.app')
@section('content')

<!DOCTYPE HTML>
<html>

<head>
    <title>dartsArrange</title>
</head>

<body>

    <h3>マスターアウト編</h3>
    <br>
    <h4>説明</h4>
    <br>
    <p>①検索したいスコアか名前が必須でフライトは任意で選択してください</p>
    <p>②検索をクリックすると条件にあったものが表示されます</p>
    <p>③比率やランキング順に表示されアレンジの統計を出すことが出来ます</p>
    <br>

    <img class="arrangedata_explanation" src="{{ url('/img/example.png')}}">


    <h3>検索</h3>
    <br>
    <form method="GET" action="{{ url('../arrange-data/masterout_data') }}" class="form-inline my-2 my-lg-0">
        <h5>スコア</h5>
        <p><input type="text" class="form-control mr-sm-2" name="keyword" value="{{$keyword}}"></p><br>
        <p>フライト<br>
            <input type="radio" name="rating" value="A"> Aフライト
            <input type="radio" name="rating" value="B"> Bフライト
            <input type="radio" name="rating" value="C"> Cフライト
        </p><br>
        <h5>名前</h5>
        <p><input type="text" class="form-control mr-sm-2" name="name" value="{{$name}}"></p><br>
        <p><input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="検索"></p>
    </form>


    <table class="table">
        @if($keyword)
        <thead>
            <tr>
                <th scope="col">スコア</th>
                <th scope="col">総件数</th>
                <th scope="col">比率</th>
                <th scope="col">順位</th>
                <th scope="col">1投目</th>
                <th scope="col">2投目</th>
                <th scope="col">3投目</th>
            </tr>
        </thead>
        <tbody>
            @foreach($masterout as $key => $d)
            <tr>
                <th>{{ $d->arrangenumber }}</th>
                <td>{{ $d->count}}件</td>
                <td>{{floor($d->count/$count*100)}}%</td>
                <td>{{$key+1}}位</td>
                <td>{{ $d->arrangefirst }}</td>
                <td>{{ $d->arrangesecond }}</td>
                <td>{{ $d->arrangethird }}</td>
            </tr>
            @endforeach
            @if(!$masterout->count())
            <p>検索結果が見当たりません</p>
            @endif
            @else
            <!-- <p>スコアを入力してください</p> -->
            @endif
        </tbody>
    </table>
    <br>
    <hr>

    <table class="table">
    @if($name && !$keyword)
        <thead>
            <tr>
                <th scope="col">スコア</th>
                <th scope="col">1投目</th>
                <th scope="col">2投目</th>
                <th scope="col">3投目</th>
            </tr>
        </thead>
        <tbody>
            @foreach($masterout as $key => $d)
            <tr>
                <th>{{ $d->arrangenumber }}</th>
                <td>{{ $d->arrangefirst }}</td>
                <td>{{ $d->arrangesecond }}</td>
                <td>{{ $d->arrangethird }}</td>
            </tr>
            @endforeach
    @endif
        </tbody>
    </table>
    <br>
    <hr>




    {{ $masterout->render() }}

</body>

</html>

@endsection