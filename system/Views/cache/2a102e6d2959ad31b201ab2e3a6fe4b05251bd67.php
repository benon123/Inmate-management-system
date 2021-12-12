

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <h4>Prisoner Transfer Requests</h4>
        <div class="col-md-12">
           <table class="table table-bordered table-striped table-warning">
             <thead>
                <tr>
                    <th>Prisoner ID</th>
                    <th>Name</th>
                    <th>Date Joined</th>
                    <th>Profile</th>
                </tr>
             </thead>
             <tbody>
                 <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                         <td><?php echo e($item->p_id); ?></td>
                         <td><?php echo e($item->fname . " " . $item->lname); ?></td>
                         <td><?php echo e($item->date_joined); ?></td>
                         <td> <a href="<?php echo e(url('inmate/admin/dashboard/prisoner/'.$item->p_id)); ?>">View</a> </td>
                     </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </tbody>
           </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('inmate.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Inmate-management-system\app\views/inmate/admin/prisoner/listing.blade.php ENDPATH**/ ?>