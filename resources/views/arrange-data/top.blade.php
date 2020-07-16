@extends('layouts.app')
@section('content')

<div id="wrapper">
<div class= "content">
<h1>アレンジデータ</h1><br>
<p>ユーザーがもっとも多く回答したアレンジを抽出しランキング化した表も記載しております。</p>
<p>オープンアウト編・マスターアウト編・ダブルアウト編のどちらかを選択してください</p><br>

    <div class="arrengeproblem">
        <a href="{{ url('../arrange-data/openout_data') }}" class="btn btn-success">オープンアウト編</a><br><br>
        <a href="{{ url('/arrange-data/masterout_data') }}" class="btn btn-success ">マスターアウト編</a><br><br>
        <a href="{{ url('/arrange-data/perfect_data') }}" class="btn btn-success ">ダブルアウト編</a><br><br><br>
    </div>
</div>
</div>

@endsection