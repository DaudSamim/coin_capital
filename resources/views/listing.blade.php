@include('header_home')
                     <br><br>
                    
                     <div>


                        <div class="mt-2" style="border: 1px #e0e0e0 solid; border-radius: 34px; padding: 1%;">
                           <h3>@if($value == 'promote')Promoted Coins @elseif($value == 'verify') Verified Coins @elseif($value == 'best') All Time Best Coins @elseif($value == 'new') New Coins @endif</h3>
                           

                            <div class="mx-0 w-100 row m-3" style="height: 60px;">
                                                    <div class="px-0 align-self-center Landing_ColFontSize__16IhF col-1">
                                                      <p style="margin-left: 15%">Symbol</p>
                                                   </div>
                                                    <div class="px-0 align-self-center Landing_ColFontSize__16IhF col-3">
                                                      <p style="margin-left: 15%">Name</p>
                                                   </div>
                                                   <div class="px-0 align-self-center Landing_ColFontSize__16IhF col-3">
                                                      <p>Price</p>
                                                   </div>
                                                   <div class="px-0 align-self-center Landing_ColFontSize__16IhF col-3">
                                                      <p>Launch</p>
                                                   </div>
                                                   <div class="px-0 align-self-center Landing_ColFontSize__16IhF col-2">
                                                      <p> Vote</p>
                                                   </div>
                                                  
                                                </div>

                           <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="homeasd" role="tabpanel" aria-labelledby="home-tab">
                                 <div class="Landing_tableTrending__2HiKC">
                                    @foreach($promoted as $row)
                                    <div class="Landing_RowContain__2mn6k">
                                       <div class="mx-0 w-100 row" style="height: 60px;">
                                          <div class="px-0 col-sm-10 col-9">
                                             <a href="/coin_detail_{{$row->id}}" class="Landing_RowLink__1Qh2o">
                                                <div class="mx-0 w-100 row" style="height: 60px;">
                                                   <div class="px-0 align-self-center Landing_ColFontSize__16IhF col">
                                                      <div class="mx-0 w-100 row" style="height: 60px;">
                                                         <div class="mx-1 px-0 align-self-center Landing_ColFontSize__16IhF col-3">
                                                            <img class="Landing_CoinLogo__2ekVJ" src="{{$row->logo}}" alt="Logo">
                                                            @if($row->verify == 1)
                                                            <i class="fa fa-check-circle i-check" aria-hidden="true"></i>
                                                            @endif
                                                         </div>
                                                         <div class="px-0 align-self-center Landing_ColFontSize__16IhF Landing_FullName__YGUK2 col">
                                                            {{$row->name}}
                                                         </div>
                                                         <div class="px-0 align-self-center Landing_ColFontSize__16IhF Landing_SmallName__14yVi col">
                                                            {{$row->symbol}}
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="px-0 align-self-center Landing_ColFontSize__16IhF col-3">
                                                      <p>${{ Str::limit($row->price, 11) }}</p>
                                                   </div>
                                                   <div class="px-0 align-self-center Landing_ColFontSize__16IhF Landing_FullName__YGUK2 col-sm-3 col-2">
                                                        @php
                                                            $days = \Carbon\Carbon::parse($row->launch_date)->diffForHumans();
                                                        @endphp
                                                      <p>{{$days}}</p>
                                                   </div>
                                                   <div class="px-0 align-self-center Landing_ColFontSize__16IhF Landing_SmallName__14yVi col-sm-3 col-2">
                                                      <p>9d</p>
                                                   </div>
                                                </div>
                                             </a>
                                          </div>

                                          <div class="px-0 align-self-center Landing_ColFontSize__16IhF col-sm-2 col-3">
                                             <button type="button" class="Landing_VoteButton__2MKx0 btn btn-outline-success">
                                                <div style="display: flex; justify-content: space-evenly;">
                                                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="1em" height="1em" fill="currentColor" class="Landing_VoteIcon__11KB_">
                                                      <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z">
                                                      </path>
                                                   </svg>
                                                   <div class="Landing_VoteText__3WvuW">1583</div>
                                                </div>
                                             </button>
                                          </div>
                                       </div>
                                    </div>
                                    @endforeach
                                 </div>
                              </div>
                           </div>
                          
                        </div>
                     
                       
                     </div>
                 </div>
                     <div>
                      
                     </div>
                  </div>
               </div>
               @include('footer_home')
               
            </div>
         </div>
      </div>
      <script>!function (e) { function t(t) { for (var n, l, a = t[0], p = t[1], i = t[2], c = 0, s = []; c < a.length; c++)l = a[c], Object.prototype.hasOwnProperty.call(o, l) && o[l] && s.push(o[l][0]), o[l] = 0; for (n in p) Object.prototype.hasOwnProperty.call(p, n) && (e[n] = p[n]); for (f && f(t); s.length;)s.shift()(); return u.push.apply(u, i || []), r() } function r() { for (var e, t = 0; t < u.length; t++) { for (var r = u[t], n = !0, a = 1; a < r.length; a++) { var p = r[a]; 0 !== o[p] && (n = !1) } n && (u.splice(t--, 1), e = l(l.s = r[0])) } return e } var n = {}, o = { 1: 0 }, u = []; function l(t) { if (n[t]) return n[t].exports; var r = n[t] = { i: t, l: !1, exports: {} }; return e[t].call(r.exports, r, r.exports, l), r.l = !0, r.exports } l.m = e, l.c = n, l.d = function (e, t, r) { l.o(e, t) || Object.defineProperty(e, t, { enumerable: !0, get: r }) }, l.r = function (e) { "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(e, "__esModule", { value: !0 }) }, l.t = function (e, t) { if (1 & t && (e = l(e)), 8 & t) return e; if (4 & t && "object" == typeof e && e && e.__esModule) return e; var r = Object.create(null); if (l.r(r), Object.defineProperty(r, "default", { enumerable: !0, value: e }), 2 & t && "string" != typeof e) for (var n in e) l.d(r, n, function (t) { return e[t] }.bind(null, n)); return r }, l.n = function (e) { var t = e && e.__esModule ? function () { return e.default } : function () { return e }; return l.d(t, "a", t), t }, l.o = function (e, t) { return Object.prototype.hasOwnProperty.call(e, t) }, l.p = "/"; var a = this["webpackJsonpreact-responsive-templates"] = this["webpackJsonpreact-responsive-templates"] || [], p = a.push.bind(a); a.push = t, a = a.slice(); for (var i = 0; i < a.length; i++)t(a[i]); var f = p; r() }([])</script>
      <script src="/static/js/2.bdfe8731.chunk.js"></script>
      <script src="/static/js/main.a637d0b9.chunk.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
         
     
   </body>
</html>