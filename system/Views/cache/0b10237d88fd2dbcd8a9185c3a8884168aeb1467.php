
<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8 col-xl-8">
                <h4 class="font-weight-bold text-maroon">CREATE IMNATE ACCOUNT</h4>
                <div class="card card-body shadow bg-maroon">
                    <form action="<?php echo e(url('/auth/user/new')); ?>" method="POST" id="accountForm">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email" >Email</label>
                                    <i class="fas fa-envelope text-success"></i> <input type="text" name="email" class="form-control bg-light" autocomplete="off" required/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone_number" >Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control bg-light" autocomplete="off" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="fname" >First Name</label>
                                    <input type="text" name="fname" class="form-control bg-light" autocomplete="off" required/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="lname" >Last Name</label>
                                    </i> <input type="text" name="lname" class="form-control bg-light" autocomplete="off" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="username" class="w-100">
                                        Username 
                                        <input type="text" name="username" class="form-control" autocomplete="off"/>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="inmate" class="w-100">
                                        Your Family Member's ID 
                                        <input type="text" name="inmate" id="inmate" 
                                        class="form-control" 
                                        autocomplete="off"
                                        data-req-url="<?php echo e(url('inmate/check')); ?>"/>
                                        <span id="inmate-error"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="password" class="w-100">
                                        Password 
                                        <input type="password" name="password" class="form-control" autocomplete="off"/>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="password2" class="w-100">
                                        Confirm Password
                                        <input type="password" name="password" id="password2" class="form-control" autocomplete="off"/>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-light" id="register-btn">CREATE ACCOUNT</button>
                        </div>
                        Have an account? <a href="<?php echo e(url()); ?>">Login</a>
                    </form>
                    <div class="response" id="response"></div>
                </div>
              
            </div>
        </div>
    </div> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Inmate-management-system\app\views/form.blade.php ENDPATH**/ ?>