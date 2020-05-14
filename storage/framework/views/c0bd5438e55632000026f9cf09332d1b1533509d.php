<?php $__env->startSection('heading'); ?>
Control Panel 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<style>
    .table thead tr th {
        font-size: 0.8rem;
    }
</style>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-9"></div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">restaurant</i>
                </div>
                <h4 class="card-title">Control Panel </h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="control-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th> Branch Name  </th>
                                <th> Owner Name   </th>
                                <th> E-mail       </th>
                                <th> His Country  </th>
                                <th> Is Payment   </th>
                                <th> Is  Enabled  </th>
                                <th> Is Active    </th>
                                <th> Created At   </th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <?php if(isset($branchesOwners)): ?>
                        <tbody>
                            <tr>
                            <?php $__currentLoopData = $branchesOwners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $owner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td>   
                                <?php $__currentLoopData = $owner->branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span><?php echo e($branch->name); ?> | </span> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td> <?php echo e($owner->name); ?>    </td>
                                <td> <?php echo e($owner->email); ?>   </td>
                                <td> <?php echo e($owner->country); ?> </td>

                                <?php if($owner->payment == 1): ?>
                                <td><p class="text-white btn btn-success btn-sm "> Is Payment</p> </td>
                                <?php else: ?>
                                <td><p class="text-white btn btn-warning btn-sm "> Not Payment</p> </td>
                                <?php endif; ?>

                                <?php if($owner->enable == 1): ?>
                                <td><p class="text-white btn btn-success btn-sm "> Is Enable</p> </td>
                                <?php else: ?>
                                <td><p class="text-white btn btn-warning btn-sm "> Not Enable</p> </td>
                                <?php endif; ?>

                                <?php if($owner->active == 1): ?>
                                <td><p class="text-white btn btn-success btn-sm "> Is Active</p> </td>
                                <?php else: ?>
                                <td><p class="text-white btn btn-warning btn-sm "> Not Active</p> </td>
                                <?php endif; ?>


                                <td> <?php echo e($owner->created_at->diffForHumans()); ?> </td>

                                <td class="text-right">
                                    <!-- Start Payment Route-->
                                   <a  href="<?php echo e(route('admin.branch.payment' , $owner->id)); ?>" 
                                        class="btn btn-link btn-success btn-just-icon Payment"
                                            title="Payment Owner">
                                            <i class="material-icons">Payment</i>
                                    </a>
                                    <!-- End Payment Route-->

                                    <!-- Start Active Route-->
                                   <a  href="<?php echo e(route('admin.branch.active' , $owner->id)); ?>" 
                                        class="btn btn-link btn-success btn-just-icon Active"
                                            title="Active Owner">
                                            <i class="material-icons">Active</i>
                                    </a>
                                    <!-- End Active Route-->

                                    <!-- Start Enable Route-->
                                   <a  href="<?php echo e(route('admin.branch.enable' , $owner->id)); ?>" 
                                        class="btn btn-link btn-success btn-just-icon Enable"
                                            title="Enable Owner">
                                            <i class="material-icons">Enable</i>
                                    </a>
                                    <!-- End Enable Route-->

                                    <!-- Start Edit Route--
                                    <a  href="<?php echo e(route('admin.branch.edit' , $owner->id)); ?>" 
                                            class="btn btn-link btn-info btn-just-icon edit"
                                                title="Edit Information">
                                                <i class="material-icons">edit</i>
                                    </a>
                                     Start Edit Route-->

                                    <!-- Start Delete Route-->
                                    <a  href="<?php echo e(route('admin.branch.destroy' , $owner->id)); ?>" 
                                            class="btn btn-link btn-danger btn-just-icon remove"
                                                title="Delete">
                                                <i class="material-icons">delete</i>
                                    </a>
                                    <!-- Start Delete Route-->
                                </td>

                            </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $('#control-table').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25,  -1],
                [10, 25,  "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
            searchPlaceholder: "Search",
        }
      });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.adminDefaulte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views/admins/control.blade.php ENDPATH**/ ?>