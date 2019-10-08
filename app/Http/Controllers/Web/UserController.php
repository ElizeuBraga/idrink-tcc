<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
use File;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', 'store')->get();
        return dd($users);
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
        return view('profile', array('user' => Auth::user()));
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
        $user = Auth::user();

        //insert new image
        if($request->hasFile('avatar')){
            $oldAvatar = $user->avatar;

            //delete old image
            $avatar_path = public_path('/images/avatar/'.$oldAvatar);
            if(File::exists($avatar_path)) {
                File::delete($avatar_path);
            }

            $avatar = $request->file('avatar');
            $filename = time(). '.' .$avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300,300)->save(public_path('/images/avatar/'.$filename));

            $user->name = $request->name;
            $user->avatar = $filename;
            $user->save();
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back();
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
