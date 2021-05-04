<?php 
$this->view("header",$data);
?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5 mt-5">
                    <h2 class="heading-section">Sign Up </h2>
                </div>
            </div>
            <div class="row justify-content-center">
          
                <div class="col-md-9 col-lg-6">
                    <div class="login-wrap">
                        <h3 class="mb-4 text-center">Create Your Account<br><br><span class="mb-4 text-center"; style="font-size:16px; color:orange"><?php check_error() ?></span></h3>
                        <span class="mb-4 text-center"; style="font-size:16px; color:orange"><?php check_error() ?></span>
                      
                        <form action="#" class="signup-form" method="POST">
                            <div class="row">
                           
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="firstname" placeholder="Firstname*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="lastname" placeholder="Lastname*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="email" placeholder="Email*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="password" class="form-control" name="pw" placeholder="Password*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="password" class="form-control" name="confirm" placeholder="Confirm Password*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12 text-center">
                              
                                        <button type="submit" class="btn btn-warning rounded submit p-2 mt-2">Sign Up</button>
                                      
                                    </div>
                                </div>
                            </div>
                                </form>
                                    <div class="w-100 social-wrap">

                                      <p class="mt-4 col-md-12 text-center">I'm already a member! <a href="<?= ROOT ?>login">Sign In</a></p>
                             </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ALL JS FILES -->
    <script src="<?php echo ASSETS ?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo ASSETS ?>js/popper.min.js"></script>
    <script src="<?php echo ASSETS ?>js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="<?php echo ASSETS ?>js/jquery.superslides.min.js"></script>
    <script src="<?php echo ASSETS ?>js/bootstrap-select.js"></script>
    <script src="<?php echo ASSETS ?>js/inewsticker.js"></script>
    <script src="<?php echo ASSETS ?>js/bootsnav.js"></script>
    <script src="<?php echo ASSETS ?>js/images-loded.min.js"></script>
    <script src="<?php echo ASSETS ?>js/isotope.min.js"></script>
    <script src="<?php echo ASSETS ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo ASSETS ?>js/baguetteBox.min.js"></script>
    <script src="<?php echo ASSETS ?>js/form-validator.min.js"></script>
    <script src="<?php echo ASSETS ?>js/contact-form-script.js"></script>
    <script src="<?php echo ASSETS ?>js/custom.js"></script>
</body>

</html>