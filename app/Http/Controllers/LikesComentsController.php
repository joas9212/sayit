<?php

namespace App\Http\Controllers;

use App\LikesComents;
use Illuminate\Http\Request;

class LikesComentsController extends Controller
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
        if(LikesComents::ComentsOfUser($request->id,$request->user_id)->get()->first()===null){
            $lc = new LikesComents;
                $lc->user_id = $request->user_id;
                $lc->coments_id = $request->id;
            $lc->save();
        }
    }

    public function unlike(Request $request)
    {
        $reg = LikesComents::ComentsOfUser($request->id,$request->user_id)->get()->first();
        if($reg!==null){
            $lc = LikesComents::find($reg->id);
            $lc->delete();
        }
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
