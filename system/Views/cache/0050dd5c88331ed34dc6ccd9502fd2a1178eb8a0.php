

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <h4>User Listing</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-light bg-maroon">
                    <thead>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Account Type</th>
                        <th>Joined On</th>
                    </thead>
                    <tbody>
                        <?php
                           $i = 0; 
                        ?>
                        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo e($i); ?></td>
                                <td><?php echo e($item->first_name . " " . $item->last_name); ?></td>
                                <td><?php echo e($item->phone_number); ?></td>
                                <td><?php echo e(strtoupper($item->account_type)); ?></td>
                                <td><?php echo e(date("D d M Y", strtotime($item->created_at ))); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('inmate.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Inmate-management-system\app\views/inmate/admin/users/listing.blade.php ENDPATH**/ ?>