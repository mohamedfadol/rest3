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

<?php echo e(__('message.Add a Permission')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class='col-lg-4 col-lg-offset-4'>

    <h3><i class='fa fa-key'></i> <?php echo e(__('message.Add a Permission')); ?></h3>
    <br>

    <?php echo e(Form::open(array('route' => 'permissions.store'))); ?>


    <div class="form-group">
        <?php echo e(Form::label('name', 'Name')); ?>

        <?php echo e(Form::text('name', '', array('class' => 'form-control'))); ?>

    </div><br>
    <?php if(!$roles->isEmpty()): ?> 
        <h4>Assign Permission to Roles</h4>

        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <?php echo e(Form::checkbox('roles[]',  $role->id )); ?>

            <?php echo e(Form::label($role->name, ucfirst($role->name))); ?><br>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <br>
    <?php echo e(Form::submit('Add', array('class' => 'btn btn-primary'))); ?>


    <?php echo e(Form::close()); ?>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\permissions\create.blade.php ENDPATH**/ ?>