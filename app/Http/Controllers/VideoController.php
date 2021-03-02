<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request){
            $data=Auth::user()->id;
            $dataProfile['profile']=Profile::
                where('user_id','=',$data)
                ->paginate(1);
        }
        if ($request){
            $data=Auth::user()->id;
            $dataVideo['video']=Video::
                where('video_id','=',$data)
                ->paginate(3);
        }
        

            
        //$dataProfile['profile']=Profile::paginate();
        //echo response()->json($dataProfile);
        return view('video.index', $dataProfile, $dataVideo);
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request){
            $data=Auth::user()->id;
            $dataProfile['profile']=Profile::
                where('user_id','=',$data)
                ->paginate(1);
        }
        if ($request){
            $data=Auth::user()->id;
            $dataVideo['video']=Video::
                where('video_id','=',$data)
                ->paginate(1);
        }
        

            
        //$dataProfile['profile']=Profile::paginate();
        //echo response()->json($dataProfile);
        return view('video.create', $dataProfile, $dataVideo);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs=[
            'video_link'=>'required|string',
            'video_name'=>'required|string|max:40', 
        ];
        $msg_video=[
            'required'=>'The :attribute is required',
            'video_name'=>'The name of video is required'
        ];
        $this->validate($request, $inputs, $msg_video);
        $dataVideo = request()->except('_token');

        Video::insert($dataVideo);
        return redirect ('/video')->with('msg_video', 'Video add successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
