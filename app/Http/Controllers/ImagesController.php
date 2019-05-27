<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImagesController extends Controller
{
    public function storeImgPort(Request $request){
        //
        $user = Auth::User();
        $request->validate(['inputPort' => 'image']);
        if($request->validate(['inputPort' => 'image'])){
            $fileName = 'CoverU'.Auth::User()->id.'.jpg';
            $path = $request->inputPort->storeAs('usersCovers', $fileName, 'publicUsers');
            $user->imgPort = asset('/storage/'). '/' .$path;
        }
        $user->save();
        return redirect('user/profile')->with('success',' Update Info Message');
    }

    public function storeImgProf(Request $request){
        //      
        $user = Auth::User();
        $request->validate(['inputProf' => 'image']);
        if($request->validate(['inputProf' => 'image'])){
            $fileName = 'ProfiU'.Auth::User()->id.'.jpg';
            $path = $request->inputProf->storeAs('usersProfiles', $fileName, 'publicUsers');
            $user->imgProf = asset('/storage/'). '/' .$path;
        }
        $user->save();
        return redirect('user/profile')->with('success',' Update Info Message');
    }

}
