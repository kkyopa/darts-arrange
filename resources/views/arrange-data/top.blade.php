@extends('layouts.app')
@section('content')

<h1>アレンジデータ</h1><br>
<p>ユーザーがもっとも多く回答したアレンジを抽出しランキング化した表も記載しております。</p>
<p>オープンアウト編・マスターアウト編・パーフェクト編のどちらかを選択してください</p>

    <div class="arrengeproblem">
        <a href="{{ url('../arrange-data/openout_data') }}" class="btn btn-success col-xs-8 col-md-2">オープンアウト編</a>
        <a href="{{ url('/arrange-data/masterout_data') }}" class="btn btn-success col-xs-8 col-md-2">マスターアウト編</a>
        <a href="{{ url('/arrange-data/perfect_data') }}" class="btn btn-success col-xs-8 col-md-2">パーフェクト編</a>
    </div>

@endsection