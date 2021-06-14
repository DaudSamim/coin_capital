<style>
   .sidebar .sidebar-header{
   width: 320px ;
   }
   .sidebar{
   width: 320px ;
   }
   .page-content{
   padding: 25px 25px 25px 101px !important;
   }
</style>
<nav class="sidebar">
   <div class="sidebar-header">
      <a href="/" class="sidebar-brand" style="font-size:18px">
      Coin <span> Capital</span>
      </a>
      <div class="sidebar-toggler not-active">
         <span></span>
         <span></span>
         <span></span>
      </div>
   </div>
   <div class="sidebar-body">
      <ul class="nav">

          @if(auth()->user()->role == 1)
         <li class="nav-item">
            <a class="nav-link" href="/home" role="button">
            <i class="link-icon" data-feather="terminal"></i>
            <span class="link-title">All Coins</span>
            </a>
         </li>
         @endif  

         @if(auth()->user()->role == 2)
         <li class="nav-item">
            <a class="nav-link" href="/home" role="button">
            <i class="link-icon" data-feather="terminal"></i>
            <span class="link-title">My Coins</span>
            </a>
         </li>
         @endif  

         <li class="nav-item">
            <a class="nav-link" href="/favourites" role="button">
            <i class="link-icon" data-feather="terminal"></i>
            <span class="link-title">My Favourites</span>
            </a>
         </li>


             
      </ul>
   </div>
</nav>