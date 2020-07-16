<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.BillKinds')); ?>

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
        <a class="btn btn-primary" href="<?php echo e(route('billKind.create')); ?>"><i class="material-icons">add</i> <?php echo e(__('message.Add New BillKind')); ?></a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">bill_kind</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.BillKinds')); ?></h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="billkinds-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th><?php echo e(__('message.BillKind Number')); ?></th>
                                <th><?php echo e(__('message.BillKind Name')); ?></th>
                                <th><?php echo e(__('message.BillKind Name English')); ?></th>
                                <th class="disabled-sorting text-right"><?php echo e(__('message.Actions')); ?></th>
                            </tr>
                        </thead>

                    <?php if(count($billKinds) > 0 ): ?> 
                        <tbody>
                        <?php $__currentLoopData = $billKinds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $billKind): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($billKind->BillKindNumber); ?></td>
                            <td><?php echo e($billKind->BillKindName); ?></td>
                            <td><?php echo e($billKind->BillKindNameEnglish); ?></td>
                            <td class="text-right">
                                <a href="<?php echo e(route('billKind.edit' ,$billKind->id)); ?>" 
                                    class="btn btn-success btn-sm edit">
                                    <?php echo e(__('message.edit')); ?></a>
                                    <form action="<?php echo e(route('billKind.destroy' ,$billKind->id)); ?>" 
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
        $('#billkinds-table').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [5, 10, 50, "All"]
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\billKind\index.blade.php ENDPATH**/ ?>