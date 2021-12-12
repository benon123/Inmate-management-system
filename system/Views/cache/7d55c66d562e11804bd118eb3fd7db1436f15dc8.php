

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-12 col-lg-8 col-xl-8">
        <h4 class="font-weight-bold text-maroon">CREATE ADMIN USER ACCOUNT</h4>
        <div class="card card-body shadow bg-maroon">
            <form action="<?php echo e(url('inmate/admin/users/new/store')); ?>" method="POST" id="accountForm">
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
                            <label for="account_type" class="w-100">
                                Account Type 
                                <select name="account_type" id="account_type" 
                                class="form-control" id="account_type">
                                <option value="">--- select account ---</option>
                                <option value="admin">ADMIN</option>
                                <option value="staff">STAFF</option>
                                <option value="user">USER</option>
                                </select>
                              
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
            </form>
            <div class="response" id="response"></div>
        </div>
      
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
  <script>
        jQuery(() => {
            $("#account_type").on('change', function(){
                if($(this).val() === 'user')
                {
                    window.open(window.location.origin + '/auth/account', "_blank", "toolbar=yes,scrollbars=yes,resizable=yes");
                    $("#register-btn").attr('disabled', true);
                }
            });
        });  
    </script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inmate.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Inmate-management-system\app\views/inmate/admin/users/add_new.blade.php ENDPATH**/ ?>