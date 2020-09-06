<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id','desc')->paginate(10);
         // ユーザ一覧ビューでそれを表示
         return view('users.index', ['users' => $users,]);
    }

    
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $courses = $user->courses()->orderBy('created_at', 'desc')->paginate(10);
        
        return view('users.show', ['user' => $user, 'courses' => $courses] );
    }
}