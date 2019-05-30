<?php

namespace App\Http\Controllers;

use App\Coments;
use App\Topics;
use App\ImagesComents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ComentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::User();
        $coment = new Coments();
            $coment->coment = $request->coment;
            $coment->user_id = $user->id;
            $coment->topics_id = $request->topics_id;
        $coment->save();
        if(isset($request->inputImgNewComent)){
            $request->validate(['inputImgNewComent.*' => 'image|mimes:jpg,jpeg,png,bmp']);
            if($request->validate(['inputImgNewComent.*' => 'image|mimes:jpg,jpeg,png,bmp'])) {
                foreach ($request->inputImgNewComent as $image ) {
                    $NewImage = new ImagesComents();
                        $NewImage->coments_id = $coment->id;
                        $NewImage->save();
                    $fileName = 'ComentImageU'.Auth::User()->id.'C'.$coment->id.'IC'.$NewImage->id.'.jpg';
                    $path = $image->storeAs('comentsImages', $fileName, 'publicUsers');
                        $NewImage->path = asset('/storage/'). '/' .$path;;
                    $NewImage->save();

                }
            }
        }
        return redirect('user/profile')->with('tabMenu','3');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LikesTopics  $likesTopics
     * @return \Illuminate\Http\Response
     */
    public function show(LikesTopics $likesTopics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LikesTopics  $likesTopics
     * @return \Illuminate\Http\Response
     */
    public function edit(LikesTopics $likesTopics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LikesTopics  $likesTopics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LikesTopics $likesTopics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LikesTopics  $likesTopics
     * @return \Illuminate\Http\Response
     */
    public function destroy(LikesTopics $likesTopics)
    {
        //
    }
}
