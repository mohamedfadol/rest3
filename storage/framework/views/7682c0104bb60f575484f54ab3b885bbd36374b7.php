<?php $__env->startSection('head'); ?>
    <style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
    
    input[type=number] {
        -moz-appearance:textfield; /* Firefox */
    }

    .dropdown.bootstrap-select.show-tick {
        width: 100% !important
    }

    .dropdown-menu.show {
        min-width: inherit !important
    }

    .filter-option {
        color: white
    }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
Permissions
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="col-lg-12 col-lg-offset-1">
    <h1><i class="fa fa-key"></i>Available Permissions

    <a href="<?php echo e(route('employees.index')); ?>" class="btn btn-default pull-right">Employee</a>
    <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-default pull-right">Roles</a></h1>
    <hr>
    <div class="material-datatables">
        <table id="permissions-table" class="table table-bordered table-hover" cellspacing="1" width="100%" style="width:100%">

            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($permission->name); ?></td> 
                    <td>
                    <a href="<?php echo e(URL::to('permissions/'.$permission->id.'/edit')); ?>" class="btn btn-info pull-left btn-sm">Edit</a>

                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-sm pull-right']); ?>

                    <?php echo Form::close(); ?>


                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <a href="<?php echo e(URL::to('permissions/create')); ?>" class="btn btn-success">Add Permission</a>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $('#permissions-table').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [7, 14, 30, -1],
                [7, 14, 30, "All"]
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views/permissions/index.blade.php ENDPATH**/ ?>