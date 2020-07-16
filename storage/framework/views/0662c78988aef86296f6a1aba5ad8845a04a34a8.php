<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Customers')); ?>

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
        <a class="btn btn-primary" href="<?php echo e(route('customer.create')); ?>"><i class="material-icons">add</i> 
        <?php echo e(__('message.Add New Customer')); ?></a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Customers')); ?></h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="customers-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th><?php echo e(__('message.Customer Name')); ?></th>
                                <th><?php echo e(__('message.Nationality')); ?></th>
                                <th><?php echo e(__('message.E-mail')); ?></th>
                                <th><?php echo e(__('message.Phone')); ?></th>
                                <th><?php echo e(__('message.Country')); ?></th>
                                <th><?php echo e(__('message.State')); ?></th>
                                <th><?php echo e(__('message.City')); ?></th>
                                <th><?php echo e(__('message.Area')); ?></th>
                                <th><?php echo e(__('message.Street')); ?></th>
                                <th><?php echo e(__('message.CreditCard')); ?></th>
                                <th><?php echo e(__('message.Discount')); ?></th>
                                <th><?php echo e(__('message.Note')); ?></th>
                                <th><?php echo e(__('message.Created At')); ?></th>
                                <th><?php echo e(__('message.Updated At')); ?></th>
                                <th class="disabled-sorting text-right"><?php echo e(__('message.Actions')); ?></th>
                            </tr>
                        </thead>
                    <?php if(count($customers) > 0): ?>
                        <tbody>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <tr>
                                <td><?php echo e($customer->name); ?></td>
                                <td><?php echo e($customer->nationality); ?></td>
                                <td><?php echo e($customer->email); ?></td>
                                <td><?php echo e($customer->phone); ?></td>
                                <td><?php echo e($customer->country); ?></td>
                                <td><?php echo e($customer->state); ?></td>
                                <td><?php echo e($customer->city); ?></td>
                                <td><?php echo e($customer->area); ?></td>
                                <td><?php echo e($customer->street); ?></td>
                                <td><?php echo e($customer->creditCard); ?></td>
                                <td><?php echo e($customer->discount); ?></td>
                                <td><?php echo e($customer->note); ?></td>
                                <td><?php echo e($customer->created_at->diffForHumans()); ?></td>
                                <td><?php echo e($customer->updated_at->diffForHumans()); ?></td>
                                <td class="text-right">
                                    <a href="<?php echo e(route('customer.edit',$customer->id)); ?>" 
                                        class="btn btn-success btn-sm edit"><?php echo e(__('message.edit')); ?></a>
                                    <form action="<?php echo e(route('customer.destroy' ,$customer->id)); ?>" 
                                                method="POST">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger btn-sm"><?php echo e(__('message.delete')); ?></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <?php else: ?>
                        <div class="text-info text-justify text-center">
                            <p>Ther's No Data To Show</p>
                        </div>
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
        $('#customers-table').DataTable({
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views/customers/index.blade.php ENDPATH**/ ?>