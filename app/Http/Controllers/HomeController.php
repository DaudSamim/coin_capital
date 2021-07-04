<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;


class HomeController extends Controller
{

    public function home(){
        $promoted = DB::table('coins')->where('promote',1)->orderBy('id','desc')->limit(6)->get();
        $verified = DB::table('coins')->where('verify',1)->orderBy('id','desc')->limit(6)->get();
        $best = DB::table('coins')->where('best',1)->orderBy('id','desc')->limit(6)->get();
        $new_coins = DB::table('coins')->orderBy('id','desc')->limit(6)->get();

        if(auth()->check()){
             $favourites = DB::table('favourites')->where('user_id',auth()->user()->id)->orderBy('id','desc')->get()->pluck('coin_id');

            $fav_coins = DB::table('coins')->whereIn('id',$favourites)->get();
        }else{
            $fav_coins = array();
        }
       
        $banner = DB::table('banners')->first();

        return view ('index',compact('promoted','verified','best','new_coins','fav_coins','banner'));
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
        $trending_coins = DB::table('coins')->where('id','!=',$id)->where('best',1)->limit(6)->get();
        if(!$coin){
            return redirect('/');
        }

        $client = new CoinGeckoClient();
        $data = $client->derivatives()->getExchanges();
        $response = $client->getLastResponse();
        $headers = $response->getHeaders();

        try{
        $info = $client->contract()->getContract('binance-smart-chain', $coin->smart_chain);
        }
         catch(\Exception $e){
              try{
              $info = $client->contract()->getContract('ethereum', $coin->smart_chain);
              }
               catch(\Exception $e){
                  return redirect()->back()->with('alert','Please enter valid Smart Chain Contact Address');
              }
        }

        
        $price_24h = $info['market_data']['price_change_percentage_24h'];
        $market_cap_24h = $info['market_data']['market_cap_change_percentage_24h'];

        $chart = array();
        // $chart = $client->coins()->getMarketChart('bitcoin', 'usd', '365');
        try{
            $chart = $client->contract()->getMarketChart('ethereum', $coin->smart_chain, 'usd', '30');
            $market_cap =  $client->contract()->getMarketChart('ethereum', $coin->smart_chain, 'usd', '1');

                 $market = end($market_cap['market_caps'])[1];
                 $volume = end($market_cap['total_volumes'])[1];
                  $volume_24h = end($chart['total_volumes'])[1] / $chart['total_volumes'][count($chart['total_volumes']) - 3][1] * 100 ;
                 // dd($volume_24h);
                 
                 DB::table('coins')->where('id',$id)->update([
                    'volume' => $volume,
                    'market_cap' => $market,
                    'price' => $info['market_data']['current_price']['usd']
                 ]);

            $chart = $chart['prices'];
        }
         catch(\Exception $e){
              try{
                 $chart = $client->contract()->getMarketChart('binance-smart-chain', $coin->smart_chain, 'usd', '30');
           

                 $market_cap =  $client->contract()->getMarketChart('binance-smart-chain', $coin->smart_chain, 'usd', '1');

                 $market = end($market_cap['market_caps'])[1];
                 $volume = end($market_cap['total_volumes'])[1];
                 $volume_24h = end($chart['total_volumes'])[1] / $chart['total_volumes'][count($chart['total_volumes']) - 3][1] * 100 ;
                 // dd($volume_24h);
                 
                 DB::table('coins')->where('id',$id)->update([
                    'volume' => $volume,
                    'market_cap' => $market,
                    'price' => $info['market_data']['current_price']['usd']
                 ]);

                 $chart = $chart['prices'];
                  // dd($chart);

              }
               catch(\Exception $e){
                  return redirect()->back()->with('alert','Please enter valid Smart Chain Contact Address');
              }
        }


        // $chart = date("Y-m-d H:i:s", substr($value['prices'][365][0], 0, 10));
        
        return view ('coinDetail',compact('coin','trending_coins','chart','price_24h','market_cap_24h','volume_24h'));
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

    public function listing(Request $request){
        $value = $request->input('value');

        if($value == 'promote' || $value == 'best' || $value == 'verify'){
            $promoted = DB::table('coins')->where($value,1)->orderBy('id','desc')->get();
        }
        else{
             $promoted = DB::table('coins')->orderBy('id','desc')->limit(100)->get();
        }

        return view('listing',compact('promoted','value'));
    }


}
