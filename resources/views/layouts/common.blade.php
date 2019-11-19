<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
<nav>
    <ul>
        <li class=”current”><a href=”#”>ホーム</a></li>
        <li><a href=”#”>アレンジデータ</a></li>
        <li><a href=”#”>利用規約</a></li>
        <li><a href=”#”>プライバシーポリシー</a></li>
        <li><a href=”#”>お問い合わせ</a></li>
    </ul>
</nav>
       @yield('content')
<footer>
    <p>© 2019 darts-arrange All rights Reserved.</p>
</footer>

</body>
</html>