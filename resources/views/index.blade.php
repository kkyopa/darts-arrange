<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/pc.css') }}" rel="stylesheet">
        <link href="{{ asset('css/sp.css') }}" rel="stylesheet">
        <title>dartsArrange</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
    </head>
    <body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('') }}">
                        <!-- {{ config('app.name', 'Laravel') }} -->
                        ホーム
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">ログイン<span class="caret"></span></a></li>
                            <li><a href="{{ route('register') }}">新規登録<span class="caret"></span></a></li>
                            <li><a href="{{ url('/service') }}">利用規約<span class="caret"></span></a></li>
                            <li><a href="{{ url('/privacy') }}">プライバシーポリシー<span class="caret"></span></a></li>
                            <li><a href="{{ url('/contact') }}">お問い合わせ<span class="caret"></span></a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                <li><a href="{{ url('user/profile') }}">マイページ<span class="caret"></span></a></li>
                                <li><a href="{{ url('arrange-data/top') }}">アレンジデータ<span class="caret"></span></a></li>
                                <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    ログアウト<span class="caret"></span>
                                </a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <li><a href="{{ url('/service') }}">利用規約<span class="caret"></span></a></li>
                                <li><a href="{{ url('/privacy') }}">プライバシーポリシー<span class="caret"></span></a></li>
                                <li><a href="{{ url('/contact') }}">お問い合わせ<span class="caret"></span></a></li>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            ログアウト
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('user/profile') }}">マイページ</a>
                        <a href="{{ url('arrange-data/top') }}">アレンジデータ</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a href="{{ url('/service') }}">利用規約</a>
                        <a href="{{ url('/privacy') }}">プライバシーポリシー</a>
                        <a href="{{ url('/contact') }}">お問い合わせ</a>
                    @else
                        <a href="{{ route('login') }}">ログイン</a>
                        <a href="{{ route('register') }}">新規登録</a>
                        <a href="{{ url('/service') }}">利用規約</a>
                        <a href="{{ url('/privacy') }}">プライバシーポリシー</a>
                        <a href="{{ url('/contact') }}">お問い合わせ</a>
                    @endauth
                </div>
            @endif -->
            @if( Auth::check() )
                <div class="content">
                    <div class="title m-b-md">
                        ダーツアレンジデータ
                    </div>
                    <div class="description">
                        <p>このアプリはユーザーがダーツによるオリジナルのアレンジをウェブ上に保存、閲覧が可能です。</p><br>
                        <p>ウェブ上に保存したものからユーザーがもっとも多く回答したアレンジを抽出しランキング化した表も記載しております。</p><br>
                        <p>オープンアウト編・マスターアウト編・パーフェクト編３種類ございます。空いた時間に気軽に対策してください</p>
                    </div>
                    <div class="arrengeproblem">
                        <a href="{{ url('/openout') }}" class="btn-sticky">オープンアウト編</a><br><br>
                        <a href="{{ url('/masterout') }}" class="btn-sticky">マスターアウト編</a><br><br>
                        <a href="{{ url('/perfect') }}" class="btn-sticky">パーフェクト編</a><br><br><br>
                    </div>
                @else
                <div class="content">
                    <div class="title m-b-md">
                        ダーツアレンジデータ
                    </div>
                    <div class="description">
                        <p>このアプリはユーザーがダーツによるオリジナルのアレンジをウェブ上に保存、閲覧が可能です。</p><br>
                        <p>ウェブ上に保存したものからユーザーがもっとも多く回答したアレンジを抽出しランキング化した表も記載しております。</p><br>
                        <p>オープンアウト編・マスターアウト編・パーフェクト編３種類ございます。空いた時間に気軽に対策してください</p>
                        <!-- <a href="{{ url('login/twitter')}}">twitterログイン</a> -->
                        <a href="{{ url('login/twitter')}}"><img alt="文字表示" class="twitter_icon_login"  src="{{ asset('/img/twitter-login.jpg') }}"></a>
                    </div>
                @endif
                <!-- <div id="app">
                <example-component></example-component>
                </div> -->
                </div><br><br>
                <div class="content">
                    <iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="https://rcm-fe.amazon-adsystem.com/e/cm?ref=tf_til&t=kyopa-22&m=amazon&o=9&p=8&l=as1&IS1=1&detail=1&asins=B01EKS8XC4&linkId=99018fffbb6c8f788b4b39568f57a5a7&bc1=ffffff&lt1=_top&fc1=0a0909&lc1=ed2121&bg1=ffffff&f=ifr">
                    </iframe>
                    <iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="https://rcm-fe.amazon-adsystem.com/e/cm?ref=tf_til&t=kyopa-22&m=amazon&o=9&p=8&l=as1&IS1=1&detail=1&asins=B076CCCL9C&linkId=c92cb434ba2e1abcee1896630eea6554&bc1=ffffff&lt1=_top&fc1=0a0909&lc1=ed2121&bg1=ffffff&f=ifr">
                    </iframe>
                    <iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="https://rcm-fe.amazon-adsystem.com/e/cm?ref=tf_til&t=kyopa-22&m=amazon&o=9&p=8&l=as1&IS1=1&detail=1&asins=B08BX3Q8V4&linkId=b018082ec7e62894fe2837a202f4722b&bc1=ffffff&lt1=_top&fc1=0a0909&lc1=ed2121&bg1=ffffff&f=ifr">
                    </iframe>
                    <iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="https://rcm-fe.amazon-adsystem.com/e/cm?ref=tf_til&t=kyopa-22&m=amazon&o=9&p=8&l=as1&IS1=1&detail=1&asins=B01EL9NU16&linkId=009052b0236d284ed8c0bdacb5f6956d&bc1=ffffff&lt1=_top&fc1=0a0909&lc1=ed2121&bg1=ffffff&f=ifr">
                    </iframe>
                 </div>
            </div>
        </div>
    </div>
        <footer>
            <p>© 2020 Darts- Arrange All rights Reserved.</p>
        </footer>
        @yield('content')
    </body>
</html>
