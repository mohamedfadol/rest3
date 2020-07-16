<?php $__env->startSection('heading'); ?>
Branches
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
                <h4 class="card-title">Branches</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="branches-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Branch Name</th>
                                <th>Owner Name</th>
                                <th>Employees Name</th>
                                <th> Floors Count</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <?php if(isset($branches)): ?>
                        <tbody>
                            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                               <td><?php echo e($branch->name); ?></td>
                               <td><?php echo e($branch->owner->name); ?></td>
                               <td>   <?php $__currentLoopData = $branch->employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span><?php echo e($employee->firstName); ?> | </span> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </td>

                               <td><?php echo e($branch->floors->count()); ?></td>

                                <td class="text-right">
                                    <a href="<?php echo e(route('admin.branch.edit' , $branch->id)); ?>" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">edit</i>
                                    </a>
                                    
                                    <a href="<?php echo e(route('admin.branch.destroy' , $branch->id)); ?>" class="btn btn-link btn-danger btn-just-icon remove disabled"><i class="material-icons">delete</i></a>
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
        $('#branches-table').DataTable({
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
<?php echo $__env->make('theme.adminDefaulte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\admins\index.blade.php ENDPATH**/ ?>