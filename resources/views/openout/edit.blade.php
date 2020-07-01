@extends('layouts.app')
@section('content')

<!DOCTYPE HTML>
<html>
<head>
    <title>dartsArrange</title>
</head>
<body>
<h3>更新画面</h3><br>

<h4>変更前のアレンジ</h4>
<table class="table">
        <thead>
        </thead>
        <tbody>
            <tr>
                <th scope="col">スコア</th>
                <td>{{ $openout->arrangenumber }}</td>
            </tr>
            <tr>
                <th scope="col">1投目</th>
                <td>{{ $openout->arrangefirst }}</td>
            </tr>
            <tr>
                <th scope="col">2投目</th>
                <td>{{ $openout->arrangesecond }}</td>
            </tr>
            <tr>
                <th scope="col">3投目</th>
                <td>{{ $openout->arrangethird }}</td>
            </tr>

            <tr>
                <th scope="col">アレンジメモ</th>
                <td>{{ $openout->arrangememo }}</td>
            </tr>
        </tbody>
    </table>

@if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ url('openout/update', ['id' => $openout->id ]) }}" method="POST">
{{ csrf_field() }}

    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"><br><br>
    <div>
        <p>1投目</p>
        <input type="radio" name="arrangefirst_type" value="BULL">BULL
        <input type="radio" name="arrangefirst_type" value="T">トリプル
        <input type="radio" name="arrangefirst_type" value="D">ダブル
        <input type="radio" name="arrangefirst_type" value="S">シングル

        <select name="arrangefirst_score">
        <option value="">選択してください</option>
            @for($i = 1; $i <= 20; $i++)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
    </div>

    <div>
        <p>2投目</p>
        <input type="radio" name="arrangesecond_type" value="BULL">BULL
        <input type="radio" name="arrangesecond_type" value="T">トリプル
        <input type="radio" name="arrangesecond_type" value="D">ダブル
        <input type="radio" name="arrangesecond_type" value="S">シングル

        <select name="arrangesecond_score">
            <option value="">選択してください</option>
            @for($i = 1; $i <= 20; $i++)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
    </div>

    <div>
        <p>3投目</p>
        <input type="radio" name="arrangethird_type" value="BULL">BULL
        <input type="radio" name="arrangethird_type" value="T">トリプル
        <input type="radio" name="arrangethird_type" value="D">ダブル
        <input type="radio" name="arrangethird_type" value="S">シングル

        <select name="arrangethird_score">
            <option value="">選択してください</option>
            @for($i = 1; $i <= 20; $i++)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
    </div><br>


    アレンジメモ<br>
    <textarea name="arrangememo" rows="4" cols="40"></textarea>
    <br>
    <button class="btn btn-success"> 送信 </button>
</form>
{{ csrf_field() }}
<br><hr>

</body>
</html>
@endsection
