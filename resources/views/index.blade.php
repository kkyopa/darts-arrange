@extends('layouts.common')
@section('content')
    <div class="description">
        <p>このアプリはユーザーが問題を回答し、もっとも多い回答を元に正解を割り出しデータ化したダーツの01アレンジ問題に特化した問題アプリです。</p><br>
        <p>オープンアウト編・マスターアウト編・パーフェクト編を自分で選択し空いた時間に気軽に対策が行なえます。</p>
        <!-- <p>ログイン機能を使えばオリジナルのアレンジ問題を作成し解くことが可能です。</p> -->
        <div class="arrengeproblem">
            <a href="" class="btn-sticky">オープンアウト編</a>
            <a href="" class="btn-sticky">マスターアウト編</a>
            <a href="" class="btn-sticky">パーフェクト編</a>
        </div>
@endsection