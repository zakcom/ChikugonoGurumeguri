<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    //コースをお気に入りに加えるアクション。
    public function store($id)
    {
        \Auth::user()->favorite($id);
        return back();
    }
    
    //コースをお気に入りから外すアクション。
    public function destroy($id)
    {
        \Auth::user()->unfavorite($id);
        return back();
    }
}
