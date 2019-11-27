@extends('layouts.app')
@section('content')


<form method="post" enctype="multipart/form-data">
<!-- <form method="post" action="route　かっこ2つ ('posts.create') かっこ2つ" enctype="multipart/form-data"> -->
 <!-- @csrf -->
 <div class="input-table">
 <table>
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
      echo '<td>' . '<input type="text" name="name" size="10" class="example1">'. '</td>';
    }
  echo '</tr>' . "\n";
}
?>
</table>
</div>
</form>

<div class="description">
    <button type="submit">投稿する</button>
</div>

@endsection