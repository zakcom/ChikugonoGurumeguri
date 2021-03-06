<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\Contact;


class ContactsController extends Controller
{
    public function index()
    {
        $types = Contact::$types;
        $genders = Contact::$genders;
        
        return view('contacts.index', compact('types', 'genders'));
    }
    
    public function confirm(ContactRequest $request)
    {
       $contact  = new Contact($request->all());
        // 「お問い合わせ種類（checkbox）」を配列から文字列に
        $type = '';
        if (isset($request->type))
        {
            $type = implode(',', $request->type);
        }
        return view('contacts.confirm', compact('contact','type'));
    }
    
     public function complete(ContactRequest $request)
     {
         $input = $request->except('action');
         
         if ($request->action === '戻る')
         {
             return redirect()->action('ContactsController@index')->withInput($input);
         }    
             // チェックボックス（配列）を「,」区切りの文字列に
             if(isset($request->type)) {
                 $request->merge(['type' => implode(',', $request->type )]);
             }
             
             // データを保存
             Contact::create( $request->all() );
             
              // 二重送信防止
              $request->session()->regenerateToken();
              
              return view('contacts.complete');
         
     }
}
