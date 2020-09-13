<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * プロフィール登録フォームの表示
     *
     * @return Response
     */
     
     public function index() 
     {
          $is_image = false;
        if (Storage::disk('local')->exists('public/profile_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }
        return view('profile/index', ['is_image' => $is_image]);
        
     }
     
     public function store(Request $request)
    {
        //バリデーション
         $request->validate([
        'name'=>['required','string','max:255'],
        'file_name'=>['file','mimes:jpeg,png,jpg,bmb','max:2048'],
    ]);
    
      /**
     * プロフィールの保存
     *
     * @param ProfileRequest $request
     * @return Response
     */
     $request->photo->storeAs('public/profile_images', Auth::id().'.jpg');
     return redirect('profile')->with('success','新しいプロフィールを登録しました');
    }
    
     public function create()
    {
        return view('profile.index');
    }
}
