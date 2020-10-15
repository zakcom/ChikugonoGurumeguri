<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['type', 'name', 'email', 'gender', 'body'];
    
    static $types = ['ちっごについて', 'サービスについて', 'その他'];
    
    static $genders = ['男性','女性'];
}
