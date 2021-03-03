<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

use App\Models\Video;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

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
                ->paginate(0);
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
        $exp = '/watch?v=/';
        $new ='/embed/';    
        $inputs=[
            'video_link'=>'required|string|regex: (embed)',
            'video_name'=>'required|string|max:80', 
        ];
        $msg_video=[
            'required'=>'The :attribute is required',
            'video_name'=>'The name of video is required',
            'video_link'=>'Replace te word watch?v for embed'
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
    public function edit(Request $request, $id)
    {
         if ($request){
            $data=Auth::user()->id;
            $profile['profile']=Profile::
                where('user_id','=',$data)
                ->paginate(1);
        }
       


        $video=Video::findOrFail($id);
        return view('video.edit', compact('video', 'profile'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs=[
            'video_link'=>'required|string|regex: (embed)',
            'video_name'=>'required|string|max:80',
        ];
        $mensaje=['required'=>'The :attribute is required',];

        $this->validate($request, $inputs, $mensaje);

        $dataVideo = request()->except(['_token', '_method']);

        
        Video::where('id', '=',$id)->update($dataVideo);
        $dataVideo=Video::findOrFail($id);
        return redirect ('/video')->with('mensaje', 'Video uodated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video=Video::findOrFail($id);
        $video::destroy($id);

        echo response()->json($video);
        return redirect('/video')->with('msg_video', 'Video deleted!');
        
    }
}
