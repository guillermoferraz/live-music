<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Video;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
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
        $allData['allData']=Video::paginate(0);
            
        //$dataProfile['profile']=Profile::paginate();
        //echo response()->json($dataProfile);
        return view('profile.index', $dataProfile, $allData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
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
            'alias'=>'required|string|max:25',
            'image'=>'required|max:10000|mimes:jpeg,png,jpg,gif',
        ];
        $mensaje=[
            'required'=>'The :attribute is required',
            'image.required'=>'The image is required'
        ];
        $this->validate($request, $inputs, $mensaje);


        $dataProfile = request()->except('_token');

        if($request->hasFile('image')){
            $dataProfile['image']=$request->file('image')->store('uploads','public');
        }
        
        Profile::insert($dataProfile);
        //return response()->json($dataProfile);   
        return redirect('profile')->with('message', 'Data added on profile!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile=Profile::findOrFail($id);
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs=[
            'alias'=>'required|string|max:25',
        ];
        $mensaje=['required'=>'The :attribute is required',];

        if($request->hasFile('image')){
            $inputs=['image'=>'required|max:10000|mimes:jpeg,png,jpg,gif',];
            $mensaje=['image.required'=>'The image is required'];
        }
        $this->validate($request, $inputs, $mensaje);

        $dataProfile = request()->except(['_token', '_method']);

        if($request->hasFile('image')){
            $profile=Profile::findOrFail($id);

            Storage::delete('public/'.$profile->image);

            $dataProfile['image']=$request->file('image')->store('uploads', 'public');
        }
        Profile::where('id', '=',$id)->update($dataProfile);
        $profile=Profile::findOrFail($id);
        return redirect ('profile')->with('mensaje', 'Profile uodated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
