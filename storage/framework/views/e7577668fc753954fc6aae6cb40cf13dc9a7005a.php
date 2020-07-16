<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Add a Role')); ?>

<?php $__env->stopSection(); ?>
  
<?php $__env->startSection('content'); ?>

<div class='col-lg-4 col-lg-offset-4'>

    <h3><i class='fa fa-key'></i> Add Role</h3>
    <hr>

    <?php echo e(Form::open(array('route' => 'roles.store'))); ?>

        <?php echo csrf_field(); ?>
    <div class="form-group">
        <?php echo e(Form::label('name', 'Name')); ?> 
        <?php echo e(Form::text('name', null, array('class' => 'form-control'))); ?>

    </div>

    <h5><b>Assign Permissions</b></h5> 

    <div class='form-group'>
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e(Form::checkbox('permissions[]',  $permission->id )); ?>

            <?php echo e(Form::label($permission->name, ucfirst($permission->name))); ?><br>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php echo e(Form::submit('Add', array('class' => 'btn btn-primary'))); ?>


    <?php echo e(Form::close()); ?>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\roles\create.blade.php ENDPATH**/ ?>