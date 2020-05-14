<?php $__env->startSection('heading'); ?>
Customers
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
        <a class="btn btn-primary" href="<?php echo e(route('customer.create')); ?>"><i class="material-icons">add</i> Add New Customer</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title">Customers</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="customers-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Nationality</th>
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Area</th>
                                <th>Street</th>
                                <th>CreditCard</th>
                                <th>Note</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th class="disabled-sorting text-right">Actions</th>
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
                                <td><?php echo e($customer->note); ?></td>
                                <td><?php echo e($customer->created_at->diffForHumans()); ?></td>
                                <td><?php echo e($customer->updated_at->diffForHumans()); ?></td>
                                <td class="text-right">
                                    <a href="<?php echo e(route('customer.edit',$customer->id)); ?>" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">edit</i></a>
                                    <a href="<?php echo e(route('customer.destroy',$customer->id)); ?>" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\customers\index.blade.php ENDPATH**/ ?>