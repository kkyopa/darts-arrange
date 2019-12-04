@extends('layouts.app')
@section('content')

<h3>プロフィール</h3>


<div style="margin-top: 30px;">


氏名
{{ Auth::user()->name }}

メールアドレス
{{ Auth::user()->email }}

</div>

@endsection