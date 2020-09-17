<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            $courses = $user->feed_courses()->orderBy('created_at', 'desc')->paginate(10);
            
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
            ]);
         
         // 認証済みユーザ（閲覧者）のコースとして作成（リクエストされた値をもとに作成）   
        $request->user()->courses()->create([
            'courses_name' => $request->courses_name
            ]);
        //前のURLへリダイレクト
        return redirect('/');
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
}
