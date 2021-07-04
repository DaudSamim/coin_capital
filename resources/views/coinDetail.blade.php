@include('header')
<style>
    hr {
     margin-top: 0.5rem; 
     margin-bottom: 0.5rem;
    }
</style>
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
                                       <span>Contract id: {{str_limit($coin->smart_chain,20)}}</span>
                                   
                                    <span class="i-copy"><i class="far fa-copy"></i></span>
                                   </div>
                                   <div class="pills">
                                     
                                       <span class="">
                                        <h4 class="text-muted mt-4">Rank: {{$coin->rank}}</h4>
                                        @if(isset($coin->website))
                                        <a href="{{$coin->website}}"><button class="btn btn-pills"> <i class="fab fa-website"></i> Website  <i class="fas ml-3 fa-external-link-alt"></i></button></a>
                                        @endif
                                         @if(isset($coin->telegram))
                                        <a href="{{$coin->telegram}}"><button class="btn btn-pills"> <i class="fab fa-telegram-plane"></i> Telegram  <i class="fas ml-3 fa-external-link-alt"></i></button></a>
                                        @endif
                                       
                                    </span>
                                    <br>
                                    <button class="btn btn-pancake">Pancakeswap</button>
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
                                <h4>${{$coin->price}}</h4>@if(substr($price_24h, 0, 1) == '-')<span class="badge  badge-danger"><i class="fas fa-sort-down"></i> {{$price_24h}} %</span>
                                @else
                                <span class="badge  badge-success"><i class="fas fa-sort-up"></i> {{$price_24h}} %</span> 
                                @endif
                                <p class="mt-2">Market Cap <i class="fas fa-info-circle text-muted"></i></p>
                                <h5>${{$coin->market_cap}}</h5>
                               @if(substr($market_cap_24h, 0, 1) == '-')<span class="badge  badge-danger"><i class="fas fa-sort-down"></i> {{$market_cap_24h}} %</span>
                                @else
                                <span class="badge  badge-success"><i class="fas fa-sort-up"></i> {{$market_cap_24h}} %</span> 
                                @endif
                                <p class="mt-4">Volume <span class="badge badge-light">24h</span> <i class="fas fa-info-circle text-muted"></i></p>
                                <h5>${{$coin->volume}}</h5>
                               @if(substr($volume_24h, 0, 1) == '-')<span class="badge  badge-danger"><i class="fas fa-sort-down"></i> {{$volume_24h}} %</span>
                                @else
                                <span class="badge  badge-success"><i class="fas fa-sort-up"></i> {{$volume_24h}} %</span> 
                                @endif
                            </div>
                            <div class="col-md-12">
                                <hr>
                              <button class="btn btn-active">Overview</button>
                              <button class="btn btn-vote">Total Likes: 34</button>
                              <button class="btn btn-vote">Today Likes: 13</button>
                              <button class="btn  font-weight-bold">Chart</button>
                              <button class="btn font-weight-bold ">Holders</button>
                            </div>
                            <div class="col-md-9">
                                 <div id="google-line-chart" style="width: 100%; height: 500px"></div>
                               <!-- <img src="images/Capture.PNG" class="w-100 mt-3" alt=""> -->
                            </div>
                            <div class="col-md-3">
                                <h5>Trending Coins</h5>
                                @foreach($trending_coins as $row)
                                <a href="coin_detail_{{$row->id}}" style="color: black">
                                <div class="trending-coin ">
                                    <p class=""><img src="{{$row->logo}}" width="40px" alt="">{{$row->name}} </p>
                                <!-- <span class="badge badge-light">Rank: {{$row->rank}}</span> -->
                                </div>
                                </a>
                                <hr>
                               @endforeach
                            <div class="img-commercial mt-4">
                                @php
                                    $banner = DB::Table('banners')->first();
                                @endphp
                                <a href="{{$banner->anchor_detail}}"><img src="{{$banner->detail_banner}}" class="img-fluid " alt=""></a>
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
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
 
        function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
            ['Month Name', 'Price'],
 
                @php
                    foreach($chart as $d) {
                        echo "['".date("Y-m-d", substr($d[0], 0, 10))."', ".$d[1]."],";
                    }
                @endphp
        ]);
 
        var options = {
          title: 'Live Chart',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
 
          var chart = new google.visualization.LineChart(document.getElementById('google-line-chart'));
 
          chart.draw(data, options);
        }
    </script>

</body>
</html>