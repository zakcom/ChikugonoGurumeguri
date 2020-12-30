<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\Storage;
class CoursesController extends Controller
{
    
public function index() 
{
    $data = [];
if(\Auth::check())
    // 認証済みユーザを取得
    {
    $user = \Auth::user();
    // ユーザのコース一覧を作成日時の降順で取得
    // $courses = $user->feed_courses()->orderBy('created_at', 'desc')->paginate(10);
    $courses = Course::orderBy('created_at', 'desc')->paginate(10);
    $data = [
    'user' => $user,
    'courses' => $courses,
    ];
    }
return view('welcome', $data);
}




public function store(Request $request)
{
    //バリデーション
    $request->validate([
        'courses_name' => 'required|max:255',
        'adress' => 'required|max:255',
        'menu' => 'required|max:255',
        'content' => 'required|max:500',
        'photo' => 'required|max:255'
    ]);
    
    // 認証済みユーザ（閲覧者）のコースとして作成（リクエストされた値をもとに作成）   
    // $request->user()->courses()->create([
    //     'courses_name' => $request->courses_name,
    //     'adress' => $request->adress,
    //     'menu' => $request->menu,
    //     'content' => $request->content,
    //     'photo' => $request->photo
    // ]);
    
    $menu_img = new Course;
    
    if($request->isMethod('POST') && $request->file('menu_img'))
    {
     $file = $request->file('menu_img');
     $path = Storage::disk('s3')->putfile('/img',$file,'public');
     $menu_img->menu_img = Storage::disk('s3')->url($path);
     $menu_img->courses_name = $request->courses_name;
     $menu_img->adress = $request->adress;
     $menu_img->menu = $request->menu;
     $menu_img->content = $request->content;
     $menu_img->photo = $request->photo;
     $menu_img->user_id = \Auth::id();
     $menu_img->save();
     return redirect('/');
    }elseif($request->isMethod('POST') && empty($request->file('menu_img'))){
     $menu_img->courses_name = $request->courses_name;
     $menu_img->adress = $request->adress;
     $menu_img->menu = $request->menu;
     $menu_img->content = $request->content;
     $menu_img->photo = $request->photo;
     $menu_img->user_id = \Auth::id();
     $menu_img->save();
     return redirect('/');
}else{
    //前のURLへリダイレクト
    return redirect('/');
}
}

public function destroy($id)
{
    // idの値でコースを検索して取得
    $course = \App\Course::findOrFail($id);
    
    // 認証済みユーザ（閲覧者）がそのコースの所有者である場合は、コースを削除
    if(\Auth::id() === $course->user_id ){
        $course->delete();
        }
        // 前のURLへリダイレクトさせる
        return back();
}



public function create()
{
    return view('courses.form');
}

public function reports($id)
{
    // データベースよりレポートを取得。withを使って投稿ユーザー名も取得するようにする。
    // $data = \App\Course::with(['user'])->get();
    $data = \App\Course::with(['user'])->find($id);
    // dd($data);
    return view('courses.show', ['data' => $data] );
}
}
