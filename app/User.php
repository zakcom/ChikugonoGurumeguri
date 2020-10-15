<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * このユーザが所有するコース。（ courseモデルとの関係を定義）
     */
     public function courses()
     {
         return $this->hasmany(Course::class);
     }
     
     /**
     * このユーザがフォロー中のユーザ。（ Userモデルとの関係を定義）
     */
     public function followings()
     {
         return $this->belongsToMany(User::class,'user_follow', 'user_id', 'follow_id')->withTimeStamps();
     }
     
     /**
     * このユーザをフォロー中のユーザ。（ Userモデルとの関係を定義）
     */
     public function followers()
     {
         return $this->belongsToMany(User::class,'user_follow', 'follow_id', 'user_id')->withTimeStamps();
     }
     

    /**
     * $userIdで指定されたユーザをフォローする。
     *
     * @param  int  $userId
     * @return bool
     */
     public function follow($userId)
     {
        // すでにフォローしているかの確認
        $exist = $this->is_following($userId);
         // 相手が自分自身かどうかの確認
        $its_me = $this->id == $userId;
        
        if($exist || $its_me)
        {
            // すでにフォローしていれば何もしない
            return false;
        }else
        {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
     }
     
     /**
     * $userIdで指定されたユーザをアンフォローする。
     *
     * @param  int  $userId
     * @return bool
     */
     
     public function unfollow($userId)
     {
          // すでにフォローしているかの確認
         $exist = $this->is_following($userId);
         // 相手が自分自身かどうかの確認
         $its_me = $this->id == $userId;
         
         if($exist && !$its_me)
         {
         // すでにフォローしていればフォローを外す
             $this->followings()->detach($userId);
             return true;
         }else{
             // 未フォローであれば何もしない
             return false;
         }
     }
     
     /**
     * 指定された $userIdのユーザをこのユーザがフォロー中であるか調べる。フォロー中ならtrueを返す。
     *
     * @param  int  $userId
     * @return bool
     */
     public function is_following($userId)
     {
         return $this->followings()->where('follow_id', $userId)->exists();
     }
     
     /**
     * このユーザとフォロー中ユーザのオリジナルコースに絞り込む。
     */
     public function feed_courses()
     {
    // このユーザがフォロー中のユーザのidを取得して配列にする
    $userIds = $this->followings()->pluck('users.id')->toArray();
     // このユーザのidもその配列に追加
    $userIds[] = $this->id;
     // それらのユーザが所有するオリジナルコースに絞り込む
     return Course::whereIn('user_id', $userIds);
     }
     
     public function loadRelationshipCounts()
     {
         $this->loadCount('courses', 'followings', 'followers', 'favorites');
     }
     
      /**
     * このユーザがお気に入り中の投稿。（ Userモデルとの関係を定義）
     */
     public function favorites()
     {
         return $this->belongsToMany(Course::class,'favorites', 'user_id', 'course_id')->withTimeStamps();
     }
     
     
    //  このユーザのプロフィール。（ profileモデルとの関係を定義）
     public function profile()
     {
         return $this->hasOne(Profile::class);
     }
     
     
     public function favorite($courseId)
     {
         // すでにお気に入りしているかの確認
         $exist = $this->is_favoriting($courseId);
         
         if($exist){
             return false;
         }else{
             $this->favorites()->attach($courseId);
             return true;
         }
         
     }
     
     public function unfavorite($courseId)
     {
         // すでにお気に入りしているかの確認
        $exist = $this->is_favoriting($courseId);
        
        if($exist){
            $this->favorites()->detach($courseId);
            return true;
        }else{
            return false;
        }
     }
     
      /**
     * 指定された $courseIdのコースをこのユーザがお気に入り中であるか調べる。フォロー中ならtrueを返す。
     *
     * @param  int  $userId
     * @return bool
     */
     public function is_favoriting($courseId)
     {
         
         return $this->favorites()->where('course_id', $courseId)->exists();
     }
     
    
     
}
