<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
///////////////////    LOGIN METHODS   /////////////////
   public function home(){
        $coins = DB::table('coins')->where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        if(auth()->user()->role == 1){
             $coins = DB::table('coins')->orderBy('id','desc')->get();
        }
        return view ('my_coins',compact('coins'));
   }

   public function addCoin(){
        return view ('addCoin');
   }

   public function postAddCoin(Request $request){


        $this->validate($request, [
            'name' => 'required',
            'symbol' => 'required|unique:coins',
            'launch_date' => 'required',
            'website' => 'required',
        ]);


        // Code for coin validation 

        $cmc = new \CoinMarketCap\Api('9b7de681-f017-47ba-93af-f9bc53c8b6a5');

        try{
          $response = $cmc->cryptocurrency()->quotesLatest(['symbol' => $request->symbol]);
          $info = $cmc->cryptocurrency()->info(['symbol' => $request->symbol]);
        }
        catch(\Exception $e){
            return redirect()->back()->with('alert','Something wrong while adding coin, Please check coin symbol again');
        }

        $rr = strtoupper($request->symbol);
        $response = $response->data->$rr;

        $info = $info->data->$rr;
        // dd($info);

        DB::table('coins')->insert([
            'name' => $info->name,
            'user_id' => auth()->user()->id,
            'symbol' => $request->symbol,
            'description' => $info->description,
            'logo' => $info->logo,
            'price' => $response->quote->USD->price??$request->price,
            'market_cap' => $response->quote->USD->market_cap??$request->market_cap,
            'volume' => $response->quote->USD->volume_24h??null,
            'rank' => $response->cmc_rank??null,
            'launch_date' => $response->date_added,
            'smart_chain' => $request->smart_chain,
            'website' => $info->urls->website[0]??null,
            'telegram' => $info->urls->telegram[0]??null,
            'twitter' => $info->urls->twitter[0]??null,
            'pancake' => $info->urls->message_board[0]??null,
            'discord' => $info->urls->discord[0]??null,
        ]);

        return redirect('home')->with('success','Successfully Added a Coin');
   }

   public function deleteCoin($id){
        DB::table('coins')->where('id',$id)->delete();

        return redirect()->back()->with('success','Successfully Deleted');
   }
   public function promoteCoin($id){
        DB::table('coins')->where('id',$id)->update([
            'promote' => 1,
        ]);

        return redirect()->back()->with('success','Successfully Changed');
   }
   public function verifyCoin($id){
         DB::table('coins')->where('id',$id)->update([
            'verify' => 1,
        ]);
        return redirect()->back()->with('success','Successfully Changed');
   }
   public function bestCoin($id){
         DB::table('coins')->where('id',$id)->update([
            'best' => 1,
        ]);
        return redirect()->back()->with('success','Successfully Changed');
   }
   public function favourites(){
      $favourites = DB::table('favourites')->where('user_id',auth()->user()->id)->orderBy('id','desc')->get()->pluck('coin_id');

      $favourites = DB::table('coins')->whereIn('id',$favourites)->get();

      return view('my_favourites',compact('favourites'));
   }


/////////////////////    LOGOUT     ////////////////////
    public function getLogout()
    {
        Auth::guard('web')->logout();
        return redirect('login');
    }

}
