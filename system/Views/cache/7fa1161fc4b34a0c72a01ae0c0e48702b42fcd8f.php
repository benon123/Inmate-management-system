

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <h4>Register Prisoner</h4>
        <div class="col-md-12">
            <div class="card card-body">
                <form action="<?php echo e(url('inmate/admin/dashboard/prisoner/new')); ?>" method="POST" id="prisonerForm">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="p_id" class="pw-100"> Prisoner ID
                                    <input type="text" name="p_id" class="form-control" 
                                    autocomplete="off" value="P<?php echo e(substr(uniqid('P', true), 16, 23)); ?>" readonly>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="cell_no" class="pw-100">
                                Cell No
                                <input type="text" name="cell_no" class="form-control" autocomplete="off"
                                id="cell-no"/>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label for="inmate_id" class="pw-100">
                                Inmate ID
                                <input type="text" name="inmate_id" class="form-control" autocomplete="off"
                                id="imnate_id"/>
                            </label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="fname" class="pw-100">
                                    Sur Name 
                                    <input type="text" name="fname" class="form-control"
                                    autocomplete="off"/>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="fname" class="pw-100">
                                    Given Name 
                                    <input type="text" name="lname" class="form-control"
                                    autocomplete="off"/>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="dob" class="pw-100">
                                    Date of Birth 
                                    <input type="date" name="dob" class="form-control"
                                     autocomplete="off" id="dob"/>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="dob" class="pw-100">
                                    Age
                                    <input type="number" name="age" class="form-control"
                                     autocomplete="off" id="age" readonly/>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="gender" class="pw-100">
                                    Gender
                                    <select name="age" class="form-control">
                                        <option value="">-- select --</option>
                                        <option value="F">Female</option>
                                        <option value="M">Male</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="facility" class="pw-100">
                                    Prison Facility 
                                    <input type="text" name="facility" class="form-control"/>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="crime" class="pw-100">
                                    Crime Committed 
                                    <input type="text" name="crime" class="form-control"/>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="rehub" class="pw-100">
                                    Rehubilitaion Program 
                                    <input type="text" name="rehub" class="form-control"/>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="date_joined" class="pw-100">
                                    Date Joined 
                                    <input type="date" name="date_joined" class="form-control"
                                     value="<?php echo e(date('Y-m-d')); ?>"/>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="release_date" class="pw-100">
                                    Release Date 
                                    <input type="date" name="release_date" class="form-control"
                                     />
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="transfered_from" class="pw-100">
                                    Transferred From (optional)
                                    <input type="text" name="transfered_from" class="form-control"/>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-warning" id="add-btn">
                                Add New Prisoner
                            </button>
                        </div>
                        <div class="mb-3">
                            <button type="reset" class="btn btn-danger">
                                Add New Prisoner
                            </button>
                        </div>
                    </div>
                </form>
                <div class="response" id="response"></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
   <script>
        jQuery(()=> {
            $("#dob").on('blur', function(){
                let dob = Number($(this).val().substring(0, 4));
                let date = new Date();
                let year = date.getFullYear();
                $("#age").val((year - dob));
            });
        });
        request({form: 'prisonerForm', btn: 'add-btn'});
    </script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inmate.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Inmate-management-system\app\views/inmate/admin/prisoner/register.blade.php ENDPATH**/ ?>