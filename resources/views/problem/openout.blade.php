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
      echo '<td>' . '<input type="text" name="name" size="10" class="arrange_create">'.
      '<select name="names" id ="select_single_double_triple">
      <option value=1>single</option>
      <option value=2>double</option>
      <option value=3>triple</option>' .
      '</select>'.
      '</td>';
    }
  echo '</tr>' . "\n";
}

?>
</table>
</div>

<div class="description">
<textarea name="kanso" rows="4" cols="40">メモとしてご使用ください！</textarea><br>
<input type="submit" value="送信">
</form>

</div>

@endsection
