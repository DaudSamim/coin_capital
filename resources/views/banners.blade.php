@extends('layout.app')
<style>
   table th{
   border-top: none !important;
   border-bottom: none !important;
   text-align: center !important;
   }
   table td{
   border-top: none !important;
   text-align: center !important;
   }
   .form-inline-custom{
   display: flex !important;
   align-items: flex-end !important;
   align-content: center;
   }
   .form-inline-custom label{
   width: 25% !important;
   }
   .btn-grabar{
   background-color: #9B75A6 !important;
   color: #fff !important;
   padding: 10px 15px !important;
   font-size: 16px !important;
   }
   .form-check-input{
    margin-left: 0px !important;
   }
   .btn-primary{
    background-color: #9B75A6 !important;
    border: none !important;
    color: #fff;
   }
</style>
@section('content')
<div class="row">
   <div class="col-md-12">
      <h2 class="text-center">Banners</h2>
      @if(Session::has('success'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
      @endif

      @if ($errors->any())
         @foreach ($errors->all() as $error)
             <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
         @endforeach
     @endif
      <div class="card p-2">
         <br>
         <div class="row">
            <div class="col-md-5">
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-3 pb-3 pr-5">
              
              
            </div>
         </div>
      <form method="post" action="banner" enctype="multipart/form-data">
         @csrf
         <div class="row">
            <div class="col-md-4">
               <div class="table-responsive">
                
                     <h5>Long Banner</h5>
                     <input type="file" name="home_banner">   
            </div>
         </div>
         <div class="col-md-8">
             <label>Link for Long banner</label>
            <input type="text" name="anchor_home" value="{{$banner->anchor_home}}">
         </div>
         <div class="col-md-12 mt-3">
            <img src="{{$banner->home_banner}}" style="width: 100%">
         </div>
      </div>
      <br>
      <br>
      <div class="row">
            <div class="col-md-4">
               <div class="table-responsive">
                
                     <h5>Side Banner</h5>
                     <input type="file" name="side_banner">
            </div>
         </div>
          <div class="col-md-8">
            <label>Link for Sidebar banner</label>
            <input type="text" name="anchor_detail" value="{{$banner->anchor_detail}}">
         </div>
         <div class="col-md-12 mt-4">
            <img src="{{$banner->detail_banner}}" style="height: 200px;width: 200px">
         </div>
      </div>

      <button type="submit" class="btn btn-success btn-block mt-3">Update</button>
   </form>
   </div>
</div>
</div>


@endsection