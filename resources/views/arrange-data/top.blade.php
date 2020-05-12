@extends('layouts.app')
@section('content')

<h1>アレンジデータ</h1><br>
<p>ユーザーがもっとも多く回答したアレンジを抽出しランキング化した表も記載しております。</p>
<p>オープンアウト編・マスターアウト編・パーフェクト編のどちらかを選択してください</p>

    <div class="arrengeproblem">
        <a href="{{ url('../arrange-data/openout_data.blade.php') }}" class="btn btn-success">オープンアウト編</a>
        <a href="{{ url('/masterout') }}" class="btn btn-success">マスターアウト編</a>
        <a href="{{ url('/perfect') }}" class="btn btn-success">パーフェクト編</a>
    </div>

@endsection