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

<h3>オープンアウト</h3>

@isset($openout)
@foreach ($openout as $d)
    <h4>{{ $d->arrangenumber }}のアレンジ</h4>
    １投目<br>
    <h4>{{ $d->arrangefirst }}</h4>
    ２投目<br>
    <h4>{{ $d->arrangesecond }}</h4>
    ３投目<br>
    <h4>{{ $d->arrangethird }}</h4>
    <br><hr>
@endforeach
@endisset



<table >
<tr><th>&nbsp;</th><th>1本目</th><th>2本目</th><th>3本目</th>
<?php
for ( $i = 1; $i <= 180; $i++ ) {
  if ($i == 163 || $i == 166 || $i == 169 || $i == 172 || $i == 173 || $i == 175 || $i == 176 || $i == 178 || $i == 179 ) {
    continue;
  } else {
  echo '<tr>';
  echo '<th>' . $i . '</th>';
  }
    for ( $j = 1; $j <= 3; $j++ ) {
      echo '<td>' . '<input type="text" name="name" size="10" class="arrange_create">'.
      '<input type="text" name="name" size="10" class="arrange_create">'.
      '</td>';
    }
  echo '</tr>' . "\n";
}
?>
</table>




@endsection