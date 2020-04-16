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
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
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
            @endif

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
                        <a href="{{ url('problem/openout') }}" class="btn-sticky">オープンアウト編</a>
                        <a href="{{ url('problem/masterout') }}" class="btn-sticky">マスターアウト編</a>
                        <a href="{{ url('problem/perfect') }}" class="btn-sticky">パーフェクト編</a>
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
                    </div>
                @endif
                <!-- <div id="app">
                <example-component></example-component>
                </div> -->
                </div>
            </div>
        </div>
        <footer>
            <p>© 2019 darts-arrange All rights Reserved.</p>
        </footer>
    </body>
</html>
