

<?php $__env->startSection('head'); ?>
<style>
    .table thead tr th {
        font-size: 0.8rem;
        font-weight: bold;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Daily Orders Report')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Daily Orders Report')); ?></h4>
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
                <form method="POST" action="<?php echo e(route('showBillDaily')); ?>">
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

                    <div class="row">
                        <div class="form-group col-md-4 mt-4">
                            <label class="bmd-label" for="branch"><?php echo e(__('message.Branch')); ?></label>
                            <select id="branch" class="custom-select" name="branch">
                                <?php if(isset($branches)): ?>
                                    <option value="all">All</option>
                                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($branch->branch_id); ?>"><?php echo e($branch->branch_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <option value="">Thers No branches To Add</option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label class="bmd-label-floating" for="employee"><?php echo e(__('message.Added By')); ?></label>
                            <select id="users" class="custom-select" name="users">
                                <option value="">Choose One User..</option>
                                    <?php if(isset($users)): ?>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->Guid); ?>"> 
                                                <?php echo e($user->Name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>"> 
                                                <?php echo e($user->Name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?> 
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-fill btn-rose"><?php echo e(__('message.Submit')); ?></button>
                </form>
            </div>
        </div>
        <?php if(isset($orders)): ?>
            <div id="results" class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Results</h4>
                </div>
                <div class="card-body ">
                    <table id="billDaily-table" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th><?php echo e(__('message.Bill Number')); ?></th>
                                <th><?php echo e(__('message.Daily Number')); ?></th>
                                <th><?php echo e(__('message.Order Type')); ?></th>
                                <th><?php echo e(__('message.Date')); ?></th>
                                <th><?php echo e(__('message.Total')); ?></th>
                                <th><?php echo e(__('message.Tax')); ?></th>
                                <th><?php echo e(__('message.Net')); ?></th>
                                <th><?php echo e(__('message.Notes')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr  class="even pointer">
                                    <td><?php echo e($order->Number); ?></td>
                                    <td><?php echo e($order->DailyNumber); ?></td>
                                    <td><?php echo e($order->BillKindName); ?></td>
                                    <td><?php echo e($order->Date); ?></td>
                                    <td><?php echo e($order->Total); ?></td>
                                    <td><?php echo e($order->tax); ?></td>
                                    <td><?php echo e($order->Total+$order->tax); ?></td> 
                                    <td><?php echo e($order->Notes); ?></td>
                                </tr>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="lead muted text-right m-4">المجموع: <?php echo e($orders->sum('Total')); ?></div>
                    <div class="lead muted text-right m-4">الخصم: <?php echo e($orders->sum('Discount')); ?></div>
                    <div class="lead muted text-right m-4">الإضافي: <?php echo e($orders->sum('Extra')); ?></div>
                    <div class="lead muted text-right m-4">الإضافي: <?php echo e($orders->sum('Service')); ?></div>
                    <div class="lead muted text-right m-4">الضريبة: <?php echo e($orders->sum('Tax')); ?></div>
                    <div class="lead muted text-right m-4">الصافي: <?php echo e($orders->sum('Total') + $orders->sum('Extra') + $orders->sum('Service') + $orders->sum('Service') + $orders->sum('Tax') - $orders->sum('Discount')); ?></div>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
 
            $('#billDaily-table').DataTable({
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

<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rest3\resources\views/POS/billsDaily.blade.php ENDPATH**/ ?>