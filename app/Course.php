<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['courses_name'];
    
    /**
     * このコースを所有するユーザ。（ Userモデルとの関係を定義）
     */
     
     public function user()
     {
         return $this->belongsTo(User::class);
     }
         
     
}
