<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.modifires')); ?>

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
        <a class="btn btn-primary" href="<?php echo e(route('modifire.create')); ?>">
            <i class="material-icons">add</i> <?php echo e(__('message.Add New modifire')); ?></a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">power</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.modifires')); ?></h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="modifires-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th><?php echo e(__('message.modifire Arabic Name')); ?></th>
                                <th><?php echo e(__('message.modifire English Name')); ?></th>
                                <th><?php echo e(__('message.SKU')); ?></th>
                                <th><?php echo e(__('message.Cost')); ?></th>
                                <th><?php echo e(__('message.Tax')); ?></th>
                                <th><?php echo e(__('message.Price')); ?></th>
                                <th><?php echo e(__('message.Unit')); ?></th>
                                <th class="disabled-sorting text-right"><?php echo e(__('message.Actions')); ?></th>
                            </tr>
                        </thead>
                        <?php if(count($modifires) > 0): ?>
                        <tbody>
                            <?php $__currentLoopData = $modifires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($modifire->nameAr); ?></td>
                                <td><?php echo e($modifire->nameEn); ?></td>
                                <td><?php echo e($modifire->sku); ?></td>
                                <td><?php echo e($modifire->cost); ?></td>
                                <td><?php echo e($modifire->tax); ?></td>
                                <td><?php echo e($modifire->price); ?></td>
                                <td><?php echo e($modifire->unit); ?></td>
                                <td class="text-right">
                                    <a 
                                        href="<?php echo e(route('modifire.edit',$modifire->id)); ?>" 
                                            class
                                            ="btn btn-success btn-sm edit">
                                            <?php echo e(__('message.edit')); ?></a>
                                    <form action="<?php echo e(route('modifire.destroy' ,$modifire->id)); ?>" 
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
        $('#modifires-table').DataTable({
            dom: 'Bfrtip',
            buttons: ['print'],
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\modifires\index.blade.php ENDPATH**/ ?>