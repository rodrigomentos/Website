<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;
use Auth;
use Storage;
use Image;
use Response;
use File;
use App\Post;
class BiographyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
      $user = User::where('user',$user)->first();
      if($user)
      $posts = Post::with('user','coments')->orderBy('created_at','desc')->where('user_id',$user->id)->paginate(10);
      return view('biography.index',compact('user','posts'));
      return view('error.index');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function savebiography(Request $request)
    {
      $this->validate($request, [
           'biography' => 'required|image',
         ]);
       if($request->hasFile('biography'))
      {
        $photo = $request->file('biography');
        $filename = time().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->resize(300,300)->save(public_path('/img/'.$filename));
        User::where('id', Auth::user()->id)->update(['biography' => $filename]);
      }
      return back();
    }

    public function deleteImage($user_id)
    {
        if(Auth::user()->id == $user_id){
          User::where('id', Auth::user()->id)->update(['biography' =>(new UserController())->defaultImage(Auth::user()->gender)]);
        }

        return back();
    }
}
