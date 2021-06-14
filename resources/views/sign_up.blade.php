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
                                        <h1>Sign Up</h1>
                                       <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <h3 class="coin-color">Enter User Details</h3>
                                        <form action="sign_up" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Name <small class="text-danger">Required</small> </label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email <small class="text-danger">Required</small> </label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password <small class="text-danger">Required</small> </label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div> <div class="form-group">
                                                <label for="">Confirm Password <small class="text-danger">Required</small> </label>
                                                <input type="password" name="confirm_password" class="form-control" required>
                                            </div>
                                          
                                      
                                    </div>
                                   
                                    <div class="col-md-12 my-5 text-center">
                                        <button class="btn btn-submit">Submit</button>
                                    </div>
                                      </form>

                                    <a href="/login">Already a user?</a>
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