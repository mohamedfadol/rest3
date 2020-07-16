<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Branches')); ?>

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
    <div class="col-md-3">
        <a class="btn btn-primary" href="<?php echo e(route('branch.create')); ?>">
            <i class="material-icons">add</i> <?php echo e(__('message.Add New Branch')); ?>

        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">restaurant</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Branches')); ?></h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="branches-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th><?php echo e(__('message.Name')); ?></th>
                                <th><?php echo e(__('message.Location')); ?></th>
                                <th><?php echo e(__('message.Phone')); ?></th>
                                <th><?php echo e(__('message.Delivery Price')); ?></th>
                                <th><?php echo e(__('message.Tax')); ?></th>
                                <th class="disabled-sorting text-right"><?php echo e(__('message.Actions')); ?></th>
                            </tr>
                        </thead>
                        <?php if(isset($branches)): ?> 
                        <tbody>
                            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                               <td><?php echo e($branch->name); ?></td>
                               <td><?php echo e($branch->address_address); ?></td>
                               <td><?php echo e($branch->phone); ?></td>
                               <td><?php echo e($branch->delivery_price); ?></td>
                               <td><?php echo e($branch->tax); ?></td>

                                <td class="text-right">
                                    <a href="<?php echo e(route('branch.edit' , $branch->id)); ?>" 
                                        class="btn btn-success btn-sm  edit">
                                            <?php echo e(__('message.edit')); ?> 
                                    </a>
                                    <form action="<?php echo e(route('branch.destroy' ,$branch->id)); ?>" 
                                                method="POST">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger btn-sm"><?php echo e(__('message.delete')); ?></button>
                                    </form>
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
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views/branches/index.blade.php ENDPATH**/ ?>