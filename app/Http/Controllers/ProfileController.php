<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * プロフィール登録フォームの表示
     *
     * @return Response
     */
     
    //  public function index() 
    //  {
    //       $is_image = false;
    //     if (Storage::disk('local')->exists('public/profile_images/' . Auth::id() . '.jpg')) {
    //         $is_image = true;
    //     }
    //     return view('profile/index', ['is_image' => $is_image]);
        
    //  }
     
//      public function store(Request $request)
//     {
//         //バリデーション
//          $request->validate([
//         'content'=>['required','string','max:255'],
//         'profile_img'=>['file','mimes:jpeg,png,jpg,bmb','max:2048'],
//     ]);
    
//    if($file = $request->profile_img){
//  //保存するファイルに名前をつける    
//   $fileName = time().'.'.$file->getClientOriginalExtension();
//  //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
//   $target_path = public_path('/uploads/');
//   $file->move($target_path,$fileName);
       
//   }else{
//  //画像が登録されなかった時はから文字をいれる
//   $name = "";
//   }
//  $request->user()->create([
//     'content'=>$request->input('content'),
//     'profile_img'=>$fileName,
//     ]);
// }

 public function index()
     {
         $profiles = Profile::all();
 
          return view('profile.index', compact('profiles'));
     }
    

 public function create(Request $request)
    {
        if($request->isMethod('POST')){
       $path  = $request->file('image_file')->store('public/img');
       Profile::create(['profile_img' => basename($path), 'user_id' => \Auth::id(), 'content' => $request->content]);
       return redirect('/')->with(['success' => 'ファイルを保存しました']);
        }
       //get
       return view('profile.create');
    }

}
