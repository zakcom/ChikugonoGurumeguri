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
     
     public function favorite_users()
     {
         return $this->belongsToMany(Course::class, 'favorites', 'course_id', 'user_id')->withTimeStamps();
     }
         
     
}
