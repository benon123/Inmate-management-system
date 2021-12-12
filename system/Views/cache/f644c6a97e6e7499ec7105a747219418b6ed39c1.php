

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Prisoner Profile  <button type="button" class="btn btn-outline-info btn-sm"
                id="printProfile">Print Transfer Request</button></h4>
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
                            Age: <span class="text-muted"><?php echo e((intval(date('Y')) - intval(substr($collection->dob, 0, 4)))); ?></span>
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
                <hr/>
                <h4>TREANSFER REQUEST</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Transfer Id:</h5>
                    </div>
                    <div class="col-lg-6">
                        <h5><?php echo e($collection->t_id); ?></h5>
                    </div>       

                    <div class="col-lg-6">
                        <h5>Transfer  to: </h5>
                    </div>
                    <div class="col-lg-6">
                        <h5><?php echo e($collection->transfer_to); ?></h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>Reason for Transfer:</h5>
                    </div>
                    <div class="col-lg-6">
                        <h5><?php echo e($collection->reason); ?></h5>
                    </div>
                </div>
                <hr>
                <h4>REQUESTED BY</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Name :</h5>
                    </div>
                    <div class="col-lg-6">
                        <h5><?php echo e($collection->first_name . " " . $collection->last_name); ?></h5>
                    </div>       

                    <div class="col-lg-6">
                        <h5>Email : </h5>
                    </div>
                    <div class="col-lg-6">
                        <h5><?php echo e($collection->email); ?></h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>Phone Number:</h5>
                    </div>
                    <div class="col-lg-6">
                        <h5><?php echo e($collection->phone_number); ?></h5>
                    </div>
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-end">
                <?php if($collection->transfer_status == 'pending'): ?>
                    <button type="button" class="btn btn-primary ml-3 transfer"
                    data-url="<?php echo e(url("inmate/admin/dashboard/prison/transfer/actions")); ?>"
                     data-action="approve"
                     data-_token="<?php echo e(_token()); ?>"
                     data-p_id="<?php echo e($collection->p_id); ?>"
                     data-id="<?php echo e($collection->t_id); ?>">Approve Transfer Request</button>
                    <button type="button" class="btn btn-danger ml-3 transfer"
                     data-url="<?php echo e(url("inmate/admin/dashboard/prison/transfer/actions")); ?>"
                     data-action="deny" 
                     data-_token="<?php echo e(_token()); ?>"
                     data-p_id="<?php echo e($collection->p_id); ?>"
                     data-id="<?php echo e($collection->t_id); ?>">Deny Transfer Request</button>
                <?php endif; ?>
                <?php if($collection->transfer_status == 'approved'): ?>
                    <button type="button" class="btn btn-success ml-3" disabled>Transfer Request was Approved</button>
                <?php endif; ?>
                <?php if($collection->transfer_status == 'denied'): ?>
                    <button type="button" class="btn btn-danger ml-3" disabled>Transfer Request was Denied</button>
                <?php endif; ?>
            </div>
        </div>
        <div id="response"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        jQuery(() => {
            $("#printProfile").on('click', function(){
                $("#profile").printSection();
            });
            elementDataRequest({selector: 'class', el: 'transfer', method: 'POST'});
        });    
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inmate.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Inmate-management-system\app\views/inmate/admin/prisoner/transfer_request.blade.php ENDPATH**/ ?>