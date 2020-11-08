<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    
     

    public function index()
    {
        $profiles = Profile::all();
        
        return view('profile.index', compact('profiles'));
    }
    
    
    public function create()
    {
        //プロフィール設定->get
        //プロフィールがない場合はプロフィール新規作成画面
        $profile = Profile::where('user_id', \Auth::id())->get()->first();
        // dd($myprofile->content);
        if(empty($profile)){
            return view('profile.create');   
        }else{
            // dd("ok");
            //更新画面には現在あるプロフィールを一緒に持っていくのでcompact('profile')をつける
            return view('profile.edit', compact('profile'));
        }
        
    }
    
    public function store(Request $request )
    {
        // if($request->isMethod('POST') && $request->file('profile_img') && $request->content){
        // //storeメソッドで画像を指定のパスに保存
        //     $path  = $request->file('profile_img')->store('public/img');
        //     //  dd($request);
        //     Profile::create(['profile_img' => basename($path), 'user_id' => \Auth::id(), 'content' => $request->content]);
           
        //     return redirect('/')->with(['success' => 'ファイルを保存しました']);
        // }elseif($request->isMethod('POST') && $request->file('profile_img') || $request->content)
        // {
        //     $profile = new Profile;
        //     $path = $request->file('profile_img')->store('public/img');
        //     $profile->profile_img = basename($path);
        //     $profile->content = $request->content;
        //     $profile->save();
        //     return redirect('/')->with(['success' => 'ファイルを保存しました']);
        // }else
        // {
        //      return redirect('/');
        // }
            $profile = new Profile;
       
        if($request->isMethod('POST') && $request->file('profile_img'))
        {
           //storeメソッドで画像を指定のパスに保存
            $path  = $request->file('profile_img')->store('public/img'); 
            $profile->profile_img = basename($path);
            $profile->content = $request->content;
            $profile->user_id = \Auth::id();
            $profile->save();
            return redirect('/')->with(['success' => 'ファイルを保存しました']);
        }elseif($request->isMethod('POST') && $request->content)
        {
            $profile->content = $request->content;
            $profile->user_id = \Auth::id();
            $profile->save();
            return redirect('/')->with(['success' => 'ファイルを保存しました']);
        }else
        {
            return redirect('/');
        }
        
        
        
        
            // return redirect('/');
        
         //指定した文字列とHTTP動詞が一致するかをMethodメソッドで調べる。
        //  $profile = Profile::find($request->id);
        //  if($request->isMethod('POST') && $request->{
        // // //storeメソッドで画像を指定のパスに保存
        //     $path  = $request->file('profile_img')->store('public/img');
        //     Profile::create(['profile_img' => basename($path), 'user_id' => \Auth::id(), 'content' => $request->content]);
        //  }
    
    }
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        return view('profile.edit', ['profile' => $profile]);
    }
    
    public function update(Request $request)
    {
        // $profile = Profile::find($request->id);
        // // dd($profile);
        // $path  = $request->file('profile_img')->store('public/img');
        // // dd($path);
        // $profile->profile_img = basename($path);
        // $profile->content = $request->content;
        // $profile->save();
        
        $profile = Profile::find($request->id);
        if (empty($request->file('profile_img')) && $request->content){
            $profile->content = $request->content;
            $profile->save();
        }elseif($request->file('profile_img') || $request->content){
            $path = $request->file('profile_img')->store('public/img');
            $profile->profile_img = basename($path);
            $profile->content = $request->content;
            $profile->save();
        }
        else{
            return redirect('/');
        }
        
        
        return redirect('/')->with(['success' => 'プロフィールを更新しました']);
      
        
        // $profile = Profile::find($request->id);
        // $form = $request->all();
        // unset($form['_token']);
        // $profile->fill($form)->save();
        // return redirect('/');
    }
}
