<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Categories')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="<?php echo e(route('category.create')); ?>">
                <i class="material-icons">add</i><?php echo e(__('message.Add New Category')); ?> </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">category</i>
                </div>
                <h4 class="card-title"><th><?php echo e(__('message.Categories')); ?></th></h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="categories-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th><?php echo e(__('message.Icon')); ?></th>
                                <th><?php echo e(__('message.Category Name')); ?></th>
                                <th><?php echo e(__('message.SKU')); ?></th>
                                <th><?php echo e(__('message.Parent Category')); ?></th>
                                <th><?php echo e(__('message.From')); ?></th>
                                <th><?php echo e(__('message.To')); ?></th>
                                <th><?php echo e(__('message.Active')); ?></th>
                                <th class="disabled-sorting text-right"><?php echo e(__('message.Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr>
                                    <td width="9%">
                                    <img class="img-thumbnail" 
                                        src="<?php echo e(URL::asset('/storage/'.$branchname.'/category/'.$category->image)); ?>">
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
                                        <a href="<?php echo e(route('category.edit' ,$category->id)); ?>" 
                                                class="btn btn-success btn-sm edit">
                                            <?php echo e(__('message.edit')); ?></a>
                                    <form action="<?php echo e(route('category.destroy' ,$category->id)); ?>" 
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
        $('#categories-table').DataTable({
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views/categories/index.blade.php ENDPATH**/ ?>