<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Products List')); ?>

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
        <a class="btn btn-primary" href="<?php echo e(route('product.create')); ?>">
            <i class="material-icons">add</i><?php echo e(__('message.Add New Product')); ?> </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">restaurant_menu</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Products List')); ?></h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="products-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th><?php echo e(__('message.Icon')); ?></th>
                                <th><?php echo e(__('message.Product Arabic Name')); ?></th>
                                <th><?php echo e(__('message.Description')); ?></th>
                                <th><?php echo e(__('message.SKU')); ?></th>
                                <th><?php echo e(__('message.Category')); ?></th>
                                <th><?php echo e(__('message.Class Product')); ?></th>
                                <th><?php echo e(__('message.From')); ?></th>
                                <th><?php echo e(__('message.To')); ?></th>
                                <th><?php echo e(__('message.Price')); ?></th>
                                <th><?php echo e(__('message.Selling Type')); ?></th>
                                <th><?php echo e(__('message.Tax')); ?></th>
                                <th><?php echo e(__('message.Active')); ?></th>
                                <th><?php echo e(__('message.modifires')); ?></th> 
                                <th class="disabled-sorting text-right"><?php echo e(__('message.Actions')); ?></th>
                            </tr>
                        </thead>
                        <?php if(count($products) > 0 ): ?>
                            <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                        <td width="9%">
                                        <img class="img-thumbnail" 
                                            src="<?php echo e(URL::asset('/storage/'.$branchname.'/product/'.$product->image)); ?>">
                                        </td>
                                        <td><?php echo e($product->nameAr); ?></td>
                                        <td><?php echo e($product->descriptionAr); ?></td>
                                        <td><?php echo e($product->sku); ?></td>
                                        <td><?php echo e($product->category->name); ?></td>
                                        <td><?php echo e($product->class->nameAr); ?></td>
                                        <td><?php echo e($product->timedEventFrom); ?></td>
                                        <td><?php echo e($product->timedEventTo); ?></td>
                                        <?php if($product->price == '0'): ?>
                                        <td> Open</td>
                                        <?php else: ?>
                                        <td><?php echo e($product->price); ?></td>
                                        <?php endif; ?>
                                        <td><?php echo e($product->sellType); ?></td>
                                        <td><?php echo e($product->tax); ?></td>
                                        <td><?php echo e($product->active); ?></td>
                                        <td><?php $__currentLoopData = $product->modifires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span><?php echo e($modifire->nameAr); ?> </span> |
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>

                                        <td class="text-right">
                                            <a 
                                                href="<?php echo e(route('product.edit',$product->id)); ?>" 
                                                    class
                                                    ="btn btn-success btn-sm edit">
                                                    <?php echo e(__('message.edit')); ?></a>
                                    <form action="<?php echo e(route('product.destroy' ,$product->id)); ?>" 
                                                method="POST">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger btn-sm remove"><?php echo e(__('message.delete')); ?></button>
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
        $('#products-table').DataTable({
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\products\index.blade.php ENDPATH**/ ?>