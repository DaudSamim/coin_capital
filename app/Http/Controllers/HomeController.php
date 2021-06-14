<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function home(){
        $promoted = DB::table('coins')->where('promote',1)->orderBy('id','desc')->limit(6)->get();
        $verified = DB::table('coins')->where('verify',1)->orderBy('id','desc')->limit(6)->get();
        $best = DB::table('coins')->where('best',1)->orderBy('id','desc')->limit(6)->get();
        $new_coins = DB::table('coins')->orderBy('id','desc')->limit(6)->get();


        return view ('index',compact('promoted','verified','best','new_coins'));
    }

    public function signUp(){
        return view ('sign_up');
    }

    public function postSignUp(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|required_with:confirm_password|same:confirm_password',
        ]);

        DB::Table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success','Successfully Registered');
    }

    public function login(){
        return view ('login');
    }

    public function postLogin(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

         $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        if (Auth::attempt($credentials)) {
            return redirect('home');
        }

        return redirect()->back()->with('alert','Email or Password Wrong');
    }

    public function addNewCoin(){
        return view ('addCoin');
    }

    public function coinDetail($id){
        $coin = DB::table('coins')->where('id',$id)->first();
        $trending_coins = DB::table('coins')->where('id','!=',$id)->where('best',1)->limit(3)->get();
        if(!$coin){
            return redirect('/');
        }
        
        return view ('coinDetail',compact('coin','trending_coins'));
    }

    public function favourite($id){

        if(DB::table('favourites')->where('coin_id',$id)->where('user_id',auth()->user()->id)->first()){
            DB::table('favourites')->where('coin_id',$id)->where('user_id',auth()->user()->id)->delete();
            return redirect()->back()->with('success','Successfully Updated');
        }

        DB::table('favourites')->insert([
            'coin_id' => $id,
            'user_id' => auth()->user()->id,
        ]);

         return redirect()->back()->with('success','Successfully Updated');

    }


}
