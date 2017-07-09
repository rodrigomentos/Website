<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gender;
use App\Perfil;
use Auth;
use Redirect;


class UserController extends Controller
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

    protected function validator(Request $request)
    {

        $this->validate($request, [
             'name' => 'required|string|max:255',
             'lastname' => 'required|string|max:255',
             'user' => 'required|string|max:15|unique:users',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:6|confirmed',
           ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $genders = Gender::get();
      $user = new User();
        return view("auth.register",compact('genders','user'));
    }

    public function defaultImage($gender)
    {
      if( $gender== 1){
        $biography = "man.jpg";
      }else if($gender== 2){
        $biography = "woman.jpg";
      }
      return $biography;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validator($request);

      $user = new User();
      $user->name = $request->name;
      $user->lastname = $request->lastname;
      $user->user = $request->user;
      $user->gender = $request->gender;
      $user->perfil_id = 3;
      $user->biography = $this->defaultImage($request->gender);
      $user->email = $request->email;
      $user->password = bcrypt( $request->password);
      $user->save();

      return view('auth.login');
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
    public function edit()
    {
        $user = User::with('sex')->findOrFail(Auth::user()->id);
        $genders = Gender::get();

        return view('user.edit',compact('user','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $this->validate($request, [
           'name' => 'required|string|max:255',
           'lastname' => 'required|string|max:255'
         ]);

      if (Auth::user()->user == $request->user){
          $this->validate($request, ['user' => 'required|string|max:15|exists:users',]);
      }else {
          $this->validate($request, ['user' => 'required|string|max:15|unique:users',]);
      }
      if( Auth::user()->email == $request->email ){
        $this->validate($request, ['email' => 'required|string|email|max:255|exists:users',]);
      }else{
        $this->validate($request, ['email' => 'required|string|email|max:255|unique:users',]);
      }

    $user =  User::where('id', Auth::user()->id)->update(['name' => $request->name,
                                                          'lastname'=>$request->lastname,
                                                          'user'=>$request->user,
                                                          'gender'=>$request->gender,
                                                          'email'=>$request->email]);
    return back()->with('message', 'Se actualizo con exito!');
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


}
