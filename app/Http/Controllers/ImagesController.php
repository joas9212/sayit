<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImagesController extends Controller
{
    public function store(Request $request){
        //        
        $images = ImagesRoutes::find(Auth::User()->acount->business->images->id);
        $request->validate(['inputPersonalImage' => 'image']);
        if($request->validate(['inputPersonalImage' => 'image'])){
            $fileName = 'U'.Auth::User()->id.'_B'.Auth::User()->acount->business->id.'.jpg';
            $path = $request->inputPersonalImage->storeAs('users', $fileName, 'publicUsers');
            $images->personal_image = asset('/storage/'). '/' .$path;
        }
        $images->cover_image = $request->inputCoverImage;
        $images->save();
        return redirect('home')->with('success',' Update Info Message');
    }
}
