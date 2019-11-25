@extends('layouts.app')
@section('content')


<form method="post" enctype="multipart/form-data">
<!-- <form method="post" action="route　かっこ2つ ('posts.create') かっこ2つ" enctype="multipart/form-data"> -->
 <!-- @csrf -->
 <div class="form">
 <table>

<tr>
<th></th><th>1本目</th> <th>2本目</th> <th>3本目</th>
</tr>

<tr>
  <th>1</th><td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td>
</tr>

<tr>
<th>2</th><td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td>
</tr>

<tr>
<th>3</th><td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td>
</tr>

<tr>
<th>4</th><td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td>
</tr>

<tr>
<th>5</th><td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td>
</tr>

<tr>
<th>6</th><td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td>
</tr>

<tr>
<th>7</th><td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td>
</tr>

<tr>
<th>8</th><td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td>
</tr>

<tr>
<th>9</th><td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td>
</tr>

<tr>
<th>10</th><td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td>
</tr>

<tr>
<th>174</th><td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td>
</tr>

<tr>
<th>177</th><td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td>
</tr>

<tr>
<th>180</th><td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td> <td><p><input type="text" name="name" size="3" class="example1"></p></td>
</tr>

</table>
</div>

<div class="form-submit">
    <button type="submit">投稿する</button>
</div>

</form>




@endsection