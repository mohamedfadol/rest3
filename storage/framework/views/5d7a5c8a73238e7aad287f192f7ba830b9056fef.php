<?php $__env->startSection('heading'); ?>
ingredients
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
        <a class="btn btn-primary" href="<?php echo e(route('ingredient.create')); ?>"><i class="material-icons">add</i> Add New ingredient</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">kitchen</i>
                </div>
                <h4 class="card-title">ingredients</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="ingredients-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Arabic Name</th> 
                                <th>English Name</th>
                                <th>Note</th>
                                <th>Sku</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <?php if(count($ingredients) > 0 ): ?>
                        <tbody>
                            <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($ingredient->nameAr); ?></td>
                                <td><?php echo e($ingredient->nameEn); ?></td>
                                <td><?php echo e($ingredient->note); ?></td>
                                <td><?php echo e($ingredient->sku); ?></td>
                                <td><?php echo e($ingredient->unit); ?></td>
                                <td><?php echo e($ingredient->price); ?></td>
                                <td class="text-right">
                                    <a 
                                        href="<?php echo e(route('ingredient.edit',$ingredient->id)); ?>" 
                                            class
                                            ="btn btn-link btn-info btn-just-icon edit">
                                            <i class="material-icons">edit</i></a>
                                    <a 
                                        href="<?php echo e(route('ingredient.destroy',$ingredient->id)); ?>" 
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
        $('#ingredients-table').DataTable({
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views/ingredients/index.blade.php ENDPATH**/ ?>