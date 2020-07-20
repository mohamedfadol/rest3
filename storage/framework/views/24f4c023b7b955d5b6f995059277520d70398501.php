<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Deliveries')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="<?php echo e(route('delevery.create')); ?>">
                <i class="material-icons">add</i><?php echo e(__('message.Add New Delivery')); ?> </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">Delivery</i>
                </div>
                <h4 class="card-title"><th><?php echo e(__('message.Deliveries')); ?></th></h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="deliveries-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th><?php echo e(__('message.Icon')); ?></th>
                                <th><?php echo e(__('message.delevery Name')); ?></th>
                                <th><?php echo e(__('message.Phone')); ?></th>
                                <th><?php echo e(__('message.Motor Type')); ?></th>
                                <th><?php echo e(__('message.Card Number')); ?></th>
                                <th><?php echo e(__('message.Branch')); ?></th>
                                <th class="disabled-sorting text-right"><?php echo e(__('message.Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php $__currentLoopData = $deliveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr>
                                    <td width="9%">
                                    <img class="img-thumbnail" 
                                        src="<?php echo e(URL::asset('/storage/'.$branchname.'/delevery/'.$delivery->image)); ?>">
                                    </td>
                                    <td><?php echo e($delivery->name); ?></td>
                                    <td><?php echo e($delivery->phone); ?></td>
                                    <td><?php echo e($delivery->motortype); ?></td>
                                    <td><?php echo e($delivery->number); ?></td>
                                    <td><?php echo e($delivery->branch->name); ?></td>
                                    <td class="text-right">
                                        <a href="<?php echo e(route('delevery.edit' ,$delivery->id)); ?>" 
                                                class="btn btn-success btn-sm edit">
                                            <?php echo e(__('message.edit')); ?></a>
                                    <form action="<?php echo e(route('delevery.destroy' ,$delivery->id)); ?>" 
                                                method="POST">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger btn-sm"><?php echo e(__('message.delete')); ?></button>
                                    </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
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
        $('#deliveries-table').DataTable({
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views/deleveries/index.blade.php ENDPATH**/ ?>