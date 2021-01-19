

<?php $__env->startSection('head'); ?>
<style>
    .table thead tr th {
        font-size: 0.8rem;
        font-weight: bold;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Daily Bills Report')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Daily Bills Report')); ?></h4>
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
                <form method="POST" action="<?php echo e(route('showBillNumber')); ?>">
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
            <?php ($totalOrders = 0); ?> 
            <?php ($totOrders = 0); ?>
            <div id="results" class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Results</h4>
                </div>
                <div class="card-body ">
                    <table id="billNumbers-table" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th><?php echo e(__('message.Branch Name')); ?></th>
                                <th><?php echo e(__('message.Bills Number')); ?> </th>
                                <th><?php echo e(__('message.Total')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr  class="text-center">
                                <td><?php echo e($branch->branch_name); ?></td>
                                <td><?php echo e($totalOrders = $branch->ordersBetween($startDate, $endDate)->count()); ?></td>
                                <td><?php echo e($totOrders += $branch->ordersBetween($startDate, $endDate)->count()); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <td> <?php echo e(__('message.Net')); ?> </td>
                                <td>  </td>
                                <td><?php echo e($totOrders); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
 
            $('#billNumbers-table').DataTable({
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


<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rest3\resources\views/POS/billsNumber.blade.php ENDPATH**/ ?>