<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $user = User::all();
        return view('users.index',compact('user') );
    }
    public function useredit(Request $request)
    {
        $id         = $request->id;
        $name       = $request->name;
        $email      = $request->email;
        $password   = $request->password;
        $edit       = User::where('id',$id)->update(['name'=>$name,'email'=>$email,'password'=>Hash::make($request->password)]);
        return back();
    }
    public function adduser(Request $request)
    {
        $name       = $request->name;
        $email      = $request->email;
        $password   = $request->password;
        $edit       = User::create(['name'=>$name,'email'=>$email,'password'=>Hash::make($request->password)]);
        
        return back();
    }

    public function userdelete(Request $request)
    {
        $id         = $request->id;
        $delete       = User::where('id',$id)->delete();
        return back();
    }
}
