@extends('layouts.app')
@section('content')

<div class="content">
  <h3>マイページ</h3>
      {{ Auth::user()->name }}
    <br>
      アドレス
    {{ Auth::user()->email }}
    <br>
    {{ Auth::user()->rating }}
      フライト
    <br>
    <img class="profile_icon" src="{{Auth::user()->image}}">
  </div>
@endsection