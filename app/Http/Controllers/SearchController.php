<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function index (Request $request){
      $query = User::query();
     // $request->input()で検索時に入力した項目を取得
     $search = $request->input('name');
     
     if($request->has('name') && $search != ''){
        //  第3引数には両側に%を付加することによって部分一致検索にしている
         $query->where('name', 'like', '%'.$search.'%')->get();
         
         $data = $query->paginate(10);
    }else{
        return view('users.search');
    }
        //  dd($data);
         return view('users.search',['data'=> $data]);
     
    }
}