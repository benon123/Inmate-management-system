
<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-6 col-xl-6">
                <h4 class="font-weight-bold text-info">LOGIN</h4>
                <div class="card card-body shadow">
                    <?php if(!empty(response()->errors())): ?>
                        
                        <?php $__currentLoopData = response()->errors(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="text-danger"><?php echo e($item); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    
                    <form action="<?php echo e(url('users/store')); ?>" method="post" id="ginForm">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <i class="fas fa-envelope text-success"></i> <input type="text" name="email" class="form-control bg-light" placeholder="enter your email or phone number" autocomplete="off" required/>
                        </div>
                        <div class="form-group">
                            <label for="fname" class="sr-only">First Name</label>
                            <i class="fas fa-envelope text-success"></i> <input type="text" name="fname" class="form-control bg-light" autocomplete="off" required/>
                        </div>
                        <div class="form-group">
                            <label for="lname" class="sr-only">Last Name</label>
                            <i class="fas fa-envelope text-success"></i> <input type="text" name="lname" class="form-control bg-light" autocomplete="off" required/>
                        </div>
                        <div class="form-group">
                            <label for="age" class="sr-only">Age</label>
                            <i class="fas fa-envelope text-success"></i> <input type="text" name="age" class="form-control bg-light" autocomplete="off" required/>
                        </div>
                        <div class="mb-3">
                            <label for="login" class="sr-only">Login</label>
                            <input type="hidden" name="login" value="1"/>
                            <button type="submit" class="btn btn-success w-100 login-btn">PROCEED</button>
                        </div>
                        Don't have an account? <a href="<?php echo e(url('account')); ?>">Create Account</a>
                    </form>
                    <div class="response"></div>
                </div>
              
            </div>
        </div>
    </div> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Inmate-management-system\app\views/form.blade.php ENDPATH**/ ?>