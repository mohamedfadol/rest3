<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Tables')); ?>

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
        <a class="btn btn-primary" href="<?php echo e(route('table.create')); ?>"><i class="material-icons">add</i>
         <?php echo e(__('message.Add New Table')); ?></a> 
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Tables')); ?></h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="tables-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th><?php echo e(__('message.Table Name')); ?></th>
                                <th><?php echo e(__('message.Number')); ?></th>
                                <th><?php echo e(__('message.Chairs Number')); ?></th>
                                <th><?php echo e(__('message.Max Chairs Number')); ?></th>
                                <th><?php echo e(__('message.Status')); ?></th>
                                <th><?php echo e(__('message.Branch')); ?></th>
                                <th><?php echo e(__('message.Floor')); ?></th>
                                <th><?php echo e(__('message.Hoster')); ?></th>
                                <th class="disabled-sorting text-right"><?php echo e(__('message.Actions')); ?></th>
                            </tr>
                        </thead>
                    <?php if(count($tables) > 0): ?>
                        <tbody>
                            <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($table->name); ?></td>
                                <td><?php echo e($table->number); ?></td>
                                <td><?php echo e($table->chairsNumber); ?></td>
                                <td><?php echo e($table->maxChairsNumber); ?></td>
                                <td><?php echo e($table->status); ?></td>
                                <td><?php echo e($table->branch->name); ?></td>
                                <td><?php echo e($table->floor->name); ?></td>
                                <td><?php echo e($table->user->name); ?></td>
                                <td class="text-right">
                                    <a href="<?php echo e(route('table.edit',$table->id)); ?>" class="btn btn-success edit"><?php echo e(__('message.edit')); ?></a>
                                    <form action="<?php echo e(route('table.destroy' ,$table->id)); ?>" 
                                                method="POST">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger btn-sm"><?php echo e(__('message.delete')); ?></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <?php else: ?>
                        <div class="text-info text-justify text-center">
                            <p>Ther's No Data To Show</p>
                        </div>
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
        $('#tables-table').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
            searchPlaceholder: "Search records",
        }
      });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\tables\index.blade.php ENDPATH**/ ?>