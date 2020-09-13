<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // 参照させたいSQLのテーブル名を指定してあげる
    protected $table = 'profile';
    
    protected $fillable = ['content', 'profile_img' ];
    
    public function user()
    {
        //このプロフィールのユーザー
        return $this->belongsTo(User::class);
    }
}
