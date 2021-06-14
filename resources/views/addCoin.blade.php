@include('header')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border">
                        <div class="row">
                            <div class="col-md-3 custom-position" style="background-image: url(../images/Searchbarbg.png); background-size: cover;">
                               
                                    <img src="images/LogoCircle.png" class="img-fluid" alt="">
                              
                            </div>
                            <div class="col-md-9 py-4 pr-4">
                                <div class="row justify-content-center">
                                    <div class="col-md-8 text-center">
                                        <h1>Add a coin listing</h1>
                                       <hr>
                                    </div>
                                    <div class="col-md-7">
                                        <h3 class="coin-color">Enter Coin Details</h3>
                                        <form action="/add_coin" method="post" enctype="multipart/form-data">
                                          @csrf
                                            <div class="form-group">
                                                <label for="">Name <small class="text-danger">Required</small> </label>
                                                <input type="text" name="name" class="form-control" placeholder="Ex: Bitcoin" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Symbol <small class="text-danger">Required</small> </label>
                                                <input type="text" name="symbol" class="form-control" placeholder="Ex: Bitcoin" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description </label>
                                                <textarea name="description" cols="30" rows="4" class="form-control" placeholder="Short description of your coin"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Logo </label>
                                                <input type="file" name="logo" accept="image/png, image/gif, image/jpeg" class="form-control" placeholder="Ex: Bitcoin">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Price </label>
                                                <input type="number" name="price" class="form-control pl-4" placeholder="Ex: Bitcoin">
                                                <span>$</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Market Cap </label>
                                                <input type="text" name="market_cap" class="form-control pl-4" placeholder="Ex: Bitcoin">
                                                <span>$</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Launch Date <small class="text-danger">Required</small> </label>
                                                <input type="date" name="launch_date" class="form-control" placeholder="dd/mm/yy" required>
                                            </div>
                                     
                                    </div>
                                    <div class="col-md-5">
                                        <h3 class="coin-color">Contract Address</h3>
                                       
                                            <div class="form-group">
                                                <label for="">Binance Smart Chain </label>
                                                <input type="text" name="smart_chain" class="form-control" placeholder="Ex: Bitcoin">
                                            </div>
                                            <h3>Coin Links</h3>
                                            <div class="form-group">
                                                <label for="">Website <small class="text-danger">Required</small> </label>
                                                <input type="text" name="website" class="form-control" placeholder="Ex: Bitcoin" required>
                                            </div>
                                          
                                            <div class="form-group">
                                                <label for="">Telegaram </label>
                                                <input type="text" name="telegram" class="form-control" placeholder="Ex: Bitcoin">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Twitter </label>
                                                <input type="text" name="twitter" class="form-control" placeholder="Ex: Bitcoin">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Pancakeswap direct link</label>
                                                <input type="text" name="pancake" class="form-control" placeholder="Ex: Bitcoin">
                                            </div>
                                            <div class="form-group">
                                                <label for="">discord </label>
                                                <input type="text" name="discord" class="form-control" placeholder="Ex:">
                                            </div>
                                        
                                    </div>
                                    <div class="col-md-12 my-5 text-center">
                                        <button class="btn btn-submit">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                    @include('footer')

                </div>

            </div>

        </div>

    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>

</html>