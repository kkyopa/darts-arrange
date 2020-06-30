@extends('layouts.app')
@section('content')

<!DOCTYPE HTML>
<html>
<head>
    <title>掲示板</title>
</head>
<body>

<h1>アレンジ表を完成させよう!!</h1>
<br>
<h3>パーフェクト編入力説明</h3>
<br>
<p>①スコアを入力する際は、DBULLかSBULLを選ぶか、シングル、ダブル、トリプルのいずれかを選択したのち、数字も合わせて選択してください。</p>
<p>②メモが必要な場合はアレンジメモに記述。</p>
<p>③送信ボタンを押すと完了です!自動でアレンジのスコアが入力されます。</p>
<p>④アレンジメモを確認したい、アレンジの変更、削除は詳細ボタンで変更できます。</p>
<br>

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

    <div>
        <p>1投目</p>
        <input type="radio" name="arrangefirst_type" value="DBULL">DBULL
        <input type="radio" name="arrangefirst_type" value="SBULL">SBULL
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
        <input type="radio" name="arrangesecond_type" value="DBULL">DBULL
        <input type="radio" name="arrangesecond_type" value="SBULL">SBULL
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
        <input type="radio" name="arrangethird_type" value="DBULL">DBULL
        <input type="radio" name="arrangethird_type" value="D">ダブル

        <select name="arrangethird_score">
        <option value="">選択してください</option>
            @for($i = 1; $i <= 20; $i++)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
    </div><br>
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
<br><hr>
{{ $perfect->render() }}
</body>
</html>

@endsection