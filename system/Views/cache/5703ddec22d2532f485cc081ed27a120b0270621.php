

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <h4>Transfers Requests</h4>
            <table class="table table-bordered table-striped table-light">
                <thead>
                    <th>Transfer ID</th>
                    <th>Requested On</th>
                    <th>Transfer Status</th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $transfer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                            <td><?php echo e($item->created_at); ?></td>
                            <td>
                                <?php if($item->transfer_status == 'pending'): ?>
                                    <span class="badge badge-warning"><?php echo e($item->transfer_status); ?></span>
                                <?php elseif($item->transfer_status == 'complete'): ?>
                                    <span class="badge badge-primary"><?php echo e($item->transfer_status); ?></span>
                                <?php elseif($item->transfer_status == 'denied'): ?>
                                    <span class="badge badge-danger"><?php echo e($item->transfer_status); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inmate.inmate_base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Inmate-management-system\app\views/inmate/transfers/listing.blade.php ENDPATH**/ ?>