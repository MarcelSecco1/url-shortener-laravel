<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUrlRequest;
use Illuminate\Support\Str;
use App\Models\Url;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class UrlController extends Controller
{
    public function index(){
        $sessionId = Session::getId();
        $id_user = Str::random(12);
        Redis::set($sessionId, $id_user);
        return view('welcome');
    }

    public function shorten(StoreUrlRequest $request){
        $url = $request->url;
        $short_url = Str::random(7);

        Redis::set($short_url, $url);
       
        return redirect()->route('index')->with('short_url', $short_url);
    }

    public function show($short_url){
        $url = Redis::get($short_url);
        return redirect($url);
    }

   

}

