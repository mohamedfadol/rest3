<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
Roles
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="col-lg-12 col-lg-offset-1">
    <h1><i class="fa fa-key"></i> Roles

    <a href="<?php echo e(route('employees.index')); ?>" class="btn btn-default pull-right">Employee</a>
    <a href="<?php echo e(route('permissions.index')); ?>" class="btn btn-default pull-right">Permissions</a></h1>
    <hr>
    <div class="material-datatables">
        <table id="roles-table" class="table table-bordered table-hover" cellspacing="0"  style="width:100%">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                    <td><?php echo e($role->name); ?></td>

                    <td><?php echo e(str_replace(array('[',']','"'),'', $role->permissions()->pluck('name'))); ?></td>
                    <td>
                    <a href="<?php echo e(URL::to('roles/'.$role->id.'/edit')); ?>" class="btn btn-info pull-left btn-sm">Edit</a>

                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-sm pull-right']); ?>

                    <?php echo Form::close(); ?>


                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

        </table>
    </div>

    <a href="<?php echo e(URL::to('roles/create')); ?>" class="btn btn-success">Add Role</a>

</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $('#roles-table').DataTable({
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views/roles/index.blade.php ENDPATH**/ ?>