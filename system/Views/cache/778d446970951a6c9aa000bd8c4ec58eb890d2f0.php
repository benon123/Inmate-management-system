

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Prisoner Profile  <button type="button" class="btn btn-outline-info btn-sm"
                id="printProfile">Print Profile</button></h4>
            <div class="card card-body shadow bg-khaki" id="profile">
                <div class="row">
                    <div class="col-lg-4">
                        <h5 class="text-center">CELL NO: <?php echo e($collection->cell_no); ?></h5>
                        <img src="<?php echo e(asset('img/75-751492_prisoner-png-transparent.png')); ?>" width="200"/>
                        <p class="text-center"><?php echo e($collection->p_id); ?></p>
                        <p class="text-center">
                            <?php echo e(date('D d M Y', strtotime($collection->date_joined))); ?> - 
                            <?php echo e(date('D d M Y', strtotime($collection->release_date))); ?>

                        </p>
                    </div>
                    <div class="col-lg-8">
                        <h5 class="font-weight-bold text-danger">
                            Sur Name: <span class="text-muted"><?php echo e(strtoupper($collection->fname)); ?></span>
                        </h5>
                        <h5 class="font-weight-bold text-danger">
                            Given Name: <span class="text-muted"><?php echo e(strtoupper($collection->lname)); ?></span>
                        </h5>
                        <h5 class="font-weight-bold text-danger">
                            Gender: <span class="text-muted"><?php echo e($collection->gender == 'M' ? "MALE" : "FEMALE"); ?></span>
                        </h5>
                        <h5 class="font-weight-bold text-danger">
                            Date of Birth: <span class="text-muted"><?php echo e($collection->dob); ?></span>
                        </h5>
                        <h5 class="font-weight-bold text-danger">
                            Age: <span class="text-muted"><?php echo e((date('Y') - substr($collection->dob, 0, 4))); ?></span>
                        </h5>
                        <hr/>
                        <h5 class="font-weight-bold text-danger">
                            Facility: <span class="text-muted"><?php echo e($collection->facility); ?></span>
                        </h5>
                        <h5 class="font-weight-bold text-danger">
                            Crime: <span class="text-danger"><?php echo e($collection->crime); ?></span>
                        </h5>
                        <h5 class="font-weight-bold text-danger">
                            Release Date: <span class="text-muted"><?php echo e($collection->release_date); ?></span>
                        </h5>
                        <hr/>
                        <h5 class="font-weight-bold text-danger">
                            Rehub: <span class="text-muted"><?php echo e($collection->rehub); ?></span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        jQuery(() => {
            $("#printProfile").on('click', function(){
                $("#profile").printSection();
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inmate.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Inmate-management-system\app\views/inmate/admin/prisoner/transfer-request.blade.php ENDPATH**/ ?>