<?php $__env->startSection('heading'); ?>
Products
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
        <a class="btn btn-primary" href="<?php echo e(route('product.create')); ?>"><i class="material-icons">add</i> Add New Product</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">restaurant_menu</i>
                </div>
                <h4 class="card-title">Products</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="products-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Class Product</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Price</th>
                                <th>Selling Type</th>
                                <th>Tax</th>
                                <th>Active</th>
                                <th>Modifires</th> 
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <?php if(count($products) > 0 ): ?>
                            <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                        <td width="9%">
                                        <img class="img-thumbnail" 
                                            src="data:image/jpg;base64,<?php echo $product->image->image; ?>">
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
                                                    ="btn btn-link btn-info btn-just-icon edit">
                                                    <i class="material-icons">edit</i></a>
                                            <a 
                                                href="<?php echo e(route('product.destroy',$product->id)); ?>" 
                                                    class
                                                    ="btn btn-link btn-danger btn-just-icon remove">
                                                    <i class="material-icons">delete</i></a>
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views/products/index.blade.php ENDPATH**/ ?>