<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Storage;

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
            $profile = new Profile;
       
        if($request->isMethod('POST') && $request->file('profile_img'))
        {
           //storeメソッドで画像を指定のパスに保存
            // $path  = $request->file('profile_img')->store('public/img'); 
            $file = $request->file('profile_img');
            $path = Storage::disk('s3')->putFile('/img', $file, 'public');
            // $profile->profile_img = basename($path);
            $profile->profile_img = Storage::disk('s3')->url($path);
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
        
   
    }
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        return view('profile.edit', ['profile' => $profile]);
    }
    
    public function update(Request $request)
    {
        
        $profile = Profile::find($request->id);
        if (empty($request->file('profile_img')) && $request->content){
            $profile->content = $request->content;
            $profile->save();
        }elseif($request->file('profile_img') || $request->content){
            // $path = $request->file('profile_img')->store('public/img');
            $file = $request->file('profile_img');
            $path = Storage::disk('s3')->putFile('/img', $file, 'public');
            // $profile->profile_img = basename($path);
            $profile->profile_img = Storage::disk('s3')->url($path);
            $profile->content = $request->content;
            $profile->save();
        }
        else{
            return redirect('/');
        }
        
        
        return redirect('/')->with(['success' => 'プロフィールを更新しました']);
      
        
       
    }
    
    // public function disp()
    // {
    //     $path = Storage::disk('s3')->url($file);
    //     return view('users.card', compact('path'));
    // }
}
