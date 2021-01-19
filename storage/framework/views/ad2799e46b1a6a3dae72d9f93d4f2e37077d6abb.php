

<?php $__env->startSection('head'); ?>
<style>
    .table thead tr th {
        font-size: 0.8rem;
        font-weight: bold;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Mats Element Consuming')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Mats Element Consuming')); ?></h4>
            </div>
            <div class="card-body ">
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger py-2">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('showDelSal')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label" for="startdate"><?php echo e(__('message.From')); ?></label>
                            <input type="date" class="form-control mt-2" id="startdate" name="startdate" value="<?php echo e(Carbon\Carbon::now()->subMonth()->format('Y-m-d')); ?>" >
                        </div>

                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label" for="enddate"><?php echo e(__('message.To')); ?></label>
                            <input type="date" class="form-control mt-2" id="enddate" name="enddate" value="<?php echo e(Carbon\Carbon::now()->format('Y-m-d')); ?>" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-fill btn-rose"><?php echo e(__('message.Submit')); ?></button>
                </form>
            </div>
        </div>
            <?php if(isset($branches)): ?>
            <?php ($totalSums = 0); ?>
            <div id="results" class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Results</h4>
                </div>
                <div class="card-body ">
                    <table id="detailSal-table" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>Branch Name</th>
                                <th>Total sales</th>
                                <th>In</th>
                                <th>Out</th>
                                <th>Present</th>
                                <th>Delivery Send</th>
                                <th>Delivery Comes</th>
                                <th>Car</th> 
                            </tr>
                        </thead>
                            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php ($sumsArray = $branch->ordersSumByType($startDate, $endDate)); ?>
                            <tbody>
                                <tr  class="text-center">
                                    <td><?php echo e($branch->branch_name); ?></td>
                                    <td><?php echo e($totalSums += $branch->ordersSum($startDate, $endDate)); ?></td>
                                    <td><?php echo e($sumsArray['in']); ?></td>
                                    <td><?php echo e($sumsArray['out']); ?></td>
                                    <td><?php echo e($sumsArray['present']); ?></td>
                                    <td><?php echo e($sumsArray['delivery-send']); ?></td>
                                    <td><?php echo e($sumsArray['delivery-comes']); ?></td>
                                    <td><?php echo e($sumsArray['car']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <td>Total : <?php echo e($totalSums); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
 
            $('#detailSal-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                'excel',
                'pdf',
                'print'
                ],
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50 , 'all']
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



<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rest3\resources\views/POS/DetSal.blade.php ENDPATH**/ ?>