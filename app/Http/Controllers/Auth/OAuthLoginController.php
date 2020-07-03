<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class OAuthLoginController extends Controller
{
   //ログインボタンからリンク
   public function socialLogin($social)
   {
       return Socialite::driver($social)->redirect();
   }
   //Callback処理
   public function handleProviderCallback($social)
   {
       // ユーザ属性を取得
       try {
           $userSocial = Socialite::driver($social)->user();
       } catch (Exception $e) {
           // OAuthによるユーザー情報取得失敗
           return redirect()->route('/')->withErrors('ユーザー情報の取得に失敗しました。');
       }
       //メールアドレスで登録状況を調べる
       $user = User::where(['email' => $userSocial->getEmail()])->first();

       //メールアドレス登録の有無で条件分岐
       if($user){
           //email登録がある場合の処理
           //twitter id　が変更されている場合、DBアップデード
           if($user->twitter_id  !== $userSocial->getNickname()){
               $user->twitter_id = $userSocial->getNickname();
               $user->save();
           }

           //ログインしてトップページにリダイレクト
           Auth::login($user);
           return redirect('/');
       }else{
           //メールアドレスがなければユーザ登録
           $newuser = new User;
           $newuser->name = $userSocial->getName();
           $newuser->email = $userSocial->getEmail();
           $newuser->twitter_id = $userSocial->getNickname();

           // 画像の取得
           $img = file_get_contents($userSocial->avatar_original);
           if ($img !== false) {
               $file_name = $userSocial->id . '_' . uniqid() . '.jpg';
               File::move($file_name,public_path().'/img/register/'. $file_name);
               $newuser->image = '/img/register/'.$file_name;
           }
           //ユーザ作成
           $newuser->save();
           //ログインしてトップページにリダイレクト
           Auth::login($newuser);
           return redirect('/');
       }

   }
}