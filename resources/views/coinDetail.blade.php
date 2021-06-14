@include('header')

    <section>
        <div class="container" style="padding: 0px">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-4 bg-light-clr custom-border">
                        <div class="row">
                            <div class="col-md-4">
                                <small>@if($coin->promote == 1)Promoted &nbsp; > &nbsp; @elseif($coin->verify == 1)Verified &nbsp; > &nbsp; @elseif($coin->best == 1)Today's Best  &nbsp; > &nbsp;@endif  {{$coin->name}}</small>
                                <h1>{{$coin->name}} 
                                    <img class="Landing_CoinLogo__2ekVJ" src="{{$coin->logo}}" alt="Logo">
                                </h1>
                                <div class="form-div">
                                   <div class="copy">
                                       <span>Contract id: {{$coin->smart_chain}}</span>
                                   
                                    <span class="i-copy"><i class="far fa-copy"></i></span>
                                   </div>
                                   <div class="pills">
                                     
                                       <span class="">
                                        <h4 class="text-muted mt-4">Rank: {{$coin->rank}}</h4>
                                        <button class="btn btn-pills"> <i class="fab fa-telegram-plane"></i> 100xcoin.io  <i class="fas ml-3 fa-external-link-alt"></i></button>
                                        <button class="btn btn-pills"> <i class="fab fa-telegram-plane"></i> BscScan  <i class="fas ml-3 fa-external-link-alt"></i></button>
                                        <button class="btn btn-pills"> <i class="fab fa-telegram-plane"></i> Telegram  <i class="fas ml-3 fa-external-link-alt"></i></button>
                                        <button class="btn btn-pills"> <i class="fab fa-telegram-plane"></i> Source Code  <i class="fas ml-3 fa-external-link-alt"></i></button>
                                        <button class="btn btn-pills"> <i class="fab fa-telegram-plane"></i> Whitepaper  <i class="fas ml-3 fa-external-link-alt"></i></button>
                                   
                                    </span>
                                    <br>
                                    <button class="btn btn-pancake">Panckaeswap</button>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-4 custom-border-des">
                                <h4>Description</h4>
                                <hr>
                                <p>{{$coin->description}}</p>
                            </div>
                            <div class="col-md-4">
                                @if(auth()->check())
                                    @if(DB::table('favourites')->where('coin_id',$coin->id)->where('user_id',auth()->user()->id)->first())
                                    <div style="float: right">
                                            <a href="/favourite/{{$coin->id}}" style="color: black"><i class="fas fa-3x fa-heart"></i></a>
                                        </div>  
                                         
                                     @else   
                                        <div style="float: right">
                                            <a href="/favourite/{{$coin->id}}" style="color: black"><i class="far fa-3x fa-heart"></i></a>
                                        </div> 
                                    @endif
                                @endif
                                <p>{{$coin->name}} price</p>
                                <h4>${{$coin->price}}</h4><span class="badge  badge-danger"><i class="fas fa-sort-down"></i>5.8 %</span>
                                <p>Market Cap <i class="fas fa-info-circle text-muted"></i></p>
                                <h5>${{$coin->market_cap}}</h5>
                                <p class="text-danger"><i class="fas fa-sort-down"></i>5.8 %</p>
                                <p class="mt-4">Volume <span class="badge badge-light">24h</span> <i class="fas fa-info-circle text-muted"></i></p>
                                <h5>$678445435.87</h5>
                                <p class="text-success"><i class="fas fa-sort-down"></i>5.8 %</p>
                            </div>
                            <div class="col-md-12">
                                <hr>
                              <button class="btn btn-active">Overview</button>
                              <button class="btn btn-vote">Total Votes: 34</button>
                              <button class="btn btn-vote">Today Votes: 13</button>
                              <button class="btn  font-weight-bold">Chart</button>
                              <button class="btn font-weight-bold ">Holders</button>
                            </div>
                            <div class="col-md-9">
                               <img src="images/Capture.PNG" class="w-100 mt-3" alt="">
                            </div>
                            <div class="col-md-3">
                                <h5>Trending Coins</h5>
                                @foreach($trending_coins as $row)
                                <a href="coin_detail_{{$row->id}}" style="color: black">
                                <div class="trending-coin mt-4">
                                    <p class=""><img src="{{$row->logo}}" width="40px" alt="">{{$row->name}} </p>
                                <span class="badge badge-light">9</span>
                                </div>
                                </a>
                                <hr>
                               @endforeach
                            <div class="img-commercial mt-4">
                                <img src="images/feb-28-crypto-top-pic.jpg" class="img-fluid " alt="">
                            </div>
                            </div>
                        </div>
                        
                    </div>
                      @include('footer')
                </div>
            </div>
        </div>
    </section>
</div>

</body>
</html>