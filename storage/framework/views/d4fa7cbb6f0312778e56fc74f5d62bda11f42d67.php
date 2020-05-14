<?php $__env->startSection('heading'); ?>
Printers
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
        <a class="btn btn-primary" href="<?php echo e(route('printer.create')); ?>"><i class="material-icons">add</i> Add New Printer</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">restaurant_menu</i>
                </div>
                <h4 class="card-title">Printers</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="printers-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>English Name</th>
                                <th>Printer</th>
                                <th>Printer Name</th>
                                <th>Printer Index</th>
                                <th>Copies Number</th>
                                <th>The Branch</th>
                                <th>Note</th> 
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <?php if(count($printers) > 0 ): ?>
                            <tbody>
                                    <?php $__currentLoopData = $printers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $printer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                        <td><?php echo e($printer->name); ?></td>
                                        <td><?php echo e($printer->enName); ?></td>
                                        <td><?php echo e($printer->printer); ?></td>
                                        <td><?php echo e($printer->printerName); ?></td>
                                        <td><?php echo e($printer->printerIndex); ?></td>
                                        <td><?php echo e($printer->copiesNumber); ?></td>
                                        <td><?php echo e($printer->branch->name); ?></td>
                                        <td><?php echo e($printer->note); ?></td>

                                        <td class="text-right">
                                            <a 
                                                href="<?php echo e(route('printer.edit',$printer->id)); ?>" 
                                                    class
                                                    ="btn btn-link btn-info btn-just-icon edit">
                                                    <i class="material-icons">edit</i></a>
                                            <a 
                                                href="<?php echo e(route('printer.destroy',$printer->id)); ?>" 
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
        $('#printers-table').DataTable({
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\printer\index.blade.php ENDPATH**/ ?>