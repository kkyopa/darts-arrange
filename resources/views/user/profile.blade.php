@extends('layouts.app')
@section('content')

<h3>プロフィール</h3>

<div style="margin-top: 30px;">
  名前
    {{ Auth::user()->name }}
  <br>
    メールアドレス
  {{ Auth::user()->email }}
  <br>
  {{ Auth::user()->rating }}
    フライト
</div><br>

@endsection