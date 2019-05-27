<?php

namespace App\Http\Controllers;

use App\Topics;
use App\ImagesTopics;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TopicsController extends Controller
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
        //
        $user = Auth::User();
        $topic = new Topics();
            $topic->topic = $request->coment;
            $topic->user_id = $user->id;
        $topic->save();
        if(isset($request->inputImgNewTopic)){
            $request->validate(['inputImgNewTopic.*' => 'image|mimes:jpg,jpeg,png,bmp']);
            if($request->validate(['inputImgNewTopic.*' => 'image|mimes:jpg,jpeg,png,bmp'])) {
                foreach ($request->inputImgNewTopic as $image ) {
                    $NewImage = new ImagesTopics();
                        $NewImage->topics_id = $topic->id;
                        $NewImage->save();
                    $fileName = 'TopicImageU'.Auth::User()->id.'T'.$topic->id.'IT'.$NewImage->id.'.jpg';
                    $path = $image->storeAs('topicsImages', $fileName, 'publicUsers');
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
     * @param  \App\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function show(Topics $topics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function edit(Topics $topics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topics $topics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topics $topics)
    {
        //
    }
}
