<?php $__env->startSection('heading'); ?>
Employees
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<style>
    .table thead tr th {
        font-size: 0.8rem;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="col-lg-12 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> User Administration <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-default pull-right">Roles</a>
    <a href="<?php echo e(route('permissions.index')); ?>" class="btn btn-default pull-right">Permissions</a></h1>
    <hr>
    <div class="material-datatables">
        <table id="users-table" class="table table-bordered table-hover" cellspacing="1" style="width:100%">

            <thead>
                <tr> 
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                    <td><?php echo e($user->name); ?></td> 
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->created_at->format('F d, Y h:ia')); ?></td>
                    <td><?php echo e($user->roles()->pluck('name')->implode(' * ')); ?></td>
                    <td>
                    <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-info pull-left btn-sm" >Edit</a> 
                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-sm pull-right']); ?>

                    <?php echo Form::close(); ?>


                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

        </table>
    </div>

    <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success">Add User</a>

</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $('#users-table').DataTable({
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views/users/index.blade.php ENDPATH**/ ?>