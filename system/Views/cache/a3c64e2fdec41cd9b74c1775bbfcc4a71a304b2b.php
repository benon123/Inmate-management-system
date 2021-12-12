
<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-6 col-xl-6">
                <h4 class="font-weight-bold text-khaki">LOGIN</h4>
                <div class="card card-body shadow bg-maroon">
                    <form action="<?php echo e(url('auth/user')); ?>" method="post" id="loginForm">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="username">Username or Other User</label>
                            <i class="fas fa-user text-success"></i> <input type="text" name="username" class="form-control bg-light" placeholder="username or other user" autocomplete="off" required/>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <a href="javascript:void(0)" class="text-success" id="show-password"><i class="fas fa-eye-slash text-success"></i></a>
                                <a href="javascript:void(0)" class="text-success d-none" id="hide-password"><i class="fas fa-eye text-success"></i></a>
                            </div>
                            <input type="password" name="password" id="password" placeholder="password" class="form-control bg-light" autocomplete="off" required/>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="login" value="1"/>
                            <button type="submit" class="btn btn-outline-light w-100 login-btn">PROCEED</button>
                        </div>
                    </form>
                    <div class="response"></div>
                    <div class="mb-3">
                        Don't have an account? <a href="<?php echo e(url('auth/account')); ?>">Register</a>
                    </div>
                </div>
              
            </div>
        </div>
    </div> 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Inmate-management-system\app\views/index.blade.php ENDPATH**/ ?>