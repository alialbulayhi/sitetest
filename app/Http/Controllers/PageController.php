<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class PageController extends Controller
{
    public function __construct()
    {
    }

    public function contact(){

        $message =__('Please fill in the form');
        $info = __("Remember, we don't work on <b>Mondays</b> ");
        $user = \Auth::user();

        $options = [
            'general' => __('General Message'),
            'development' => __('Website Development'),
            'consultation' => __('Consultation'),


        ];

        return view('contact', compact('message', 'info', 'user','options'));
    }

    public function storeContact(Request $request){

        $validatDate = $request->validate([
            'sender_name' =>'required | max:10',
            'message' => 'required | min:50 | max:100'

        ]);
        $request->session() ->put('username', $request->sender_name);
         return __('done');

    }


    public function about(Request $request){

        $userName = $request->session() ->get('username');

        return view('about', ['userName'=> $userName ]);
    }

    public function clearName(Request $request){

        $request->session()->flush();

        return redirect()->back();


    }

    public function testarticle (){

        $article = Article::where('title', 'hello')->first();
        dd($article->user);


    }

}
