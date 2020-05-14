<?php $__env->startSection('heading'); ?>
Categories
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="<?php echo e(route('category.create')); ?>"><i class="material-icons">add</i> Add New Category</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">Categories</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="categories-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Parent Category</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Active</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                    <img class="img-fluid" 
                                        src="data:image/jpg;base64,<?php echo $category->image->image; ?>">
                                    </td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td><?php echo e($category->sku); ?></td>
                                    <?php if($category->cat_id == ''): ?>
                                    <td>Parent Category</td> 
                                    <?php else: ?>
                                    <td><?php echo e($category->parent->name); ?></td> 
                                    <?php endif; ?>
                                    <td><?php echo e($category->timedEventFrom); ?></td>
                                    <td><?php echo e($category->timedEventTo); ?></td>
                                    <td><?php echo e($category->active ? 'Active' : 'Not Active'); ?></td>
                                    <td class="text-right">
                                        <a href="<?php echo e(route('category.edit' ,$category->id)); ?>" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">edit</i></a>
                                        <a href="<?php echo e(route('category.destroy' ,$category->id)); ?>" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
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
        $('#categories-table').DataTable({
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\categories\index.blade.php ENDPATH**/ ?>