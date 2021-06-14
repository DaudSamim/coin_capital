<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Coin Capital</title>
  </head>
  <style>
    a{
         text-decoration: none !important;  
      }#root{
          padding-left: 9%;
          padding-right: 9%;
     }
  </style>
  <body>
     <div id="root">
  <div class="Home_navbarcontainer__3z5Rz" style="margin-top: 3%">
               <div class="Home_logocol__3l37R">
                  <a class="text-dark pt-0" href="/"><img src="images/LogoCircle.png" alt="Logo"
                     style="width: 80px;height: 70px;"> CoinCapital</a>
               </div>
               <div class="Home_navlist__3g1gx">
                  <ul>
                     <li><a class="Home_linkNavbar__AVp-X "  href="/">Advertising</a></li>
                     <li><a class="Home_linkNavbar__AVp-X " href="/home">My Coins</a> </li>
                     <li><a class="Home_linkNavbar__AVp-X " href="/">Terms</a></li>
                      @if(!auth()->check())
                      <li><a class="Home_linkNavbar__AVp-X " style="background-color: black;color: white;" href="/sign_up">Sign Up</a></li>
                      @else
                     <li><a class="Home_linkNavbar__AVp-X " style="background-color: black;color: white;" href="/home">Dashboard</a></li>
                      @endif
                      <li><a class="Home_linkNavbar__AVp-X " style="border: 1px #827f7f solid; background-color: black;color: white;" href="/"><img src="images/BNB.png" alt="Logo"
                     style="width: 30px; height: 25px;">BNB Price $399</a></li>
                  </ul>
               </div>
               <span class="Home_hamburger__BoZMm">☰</span>
            </div>

            <div class="container" style="padding-left: 0; padding-right: 0">
              <div class="row mt-4">
                        <div class="col-md-2">
                           <div class="card card-border" id="promoted1">
                              <div class="card-custom">
                                 <span>Promoted</span>
                                 <img  class="" id="promoted" src="images/startup.svg" width="26px" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="card card-border">
                              <div class="card-custom">
                                 <span>Verified</span>
                                 <img src="images/email.svg" width="26px" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="card card-border">
                              <div class="card-custom">
                                 <span>New Listings</span>
                                 <img src="images/clipboard.svg" width="26px" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="card card-border">
                              <div class="card-custom">
                                 <span>All Time</span>
                                 <img src="images/trophy.svg" width="26px" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="card card-border">
                              <div class="card-custom">
                                 <span>Contact</span>
                                 <img src="images/chatting.svg" width="26px" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="card card-border">
                              <a href="/add_coin" style="color:black">
                              <div class="card-custom">
                                 <span>Add Coin</span>
                                 <span>...</span>
                              </div>
                              </a>
                        
                           </div>
                        </div>
                     </div>
                 </div>

     
      @if(Session::has('success'))
       <div class="container" style="margin-top: 3%">           
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
    </div>
      @endif

       @if(Session::has('alert'))
        <div class="container" style="margin-top: 3%">           
      <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('alert') }}</p>
    </div>
      @endif

      @if ($errors->any())
      <div class="container" style="margin-top: 3%"> 
         @foreach ($errors->all() as $error)      
             <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
         @endforeach
         </div>
     @endif
   