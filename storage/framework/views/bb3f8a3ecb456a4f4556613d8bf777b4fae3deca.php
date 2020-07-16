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
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Add New Table')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Add New Table')); ?></h4>
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
                <form method="POST" action="<?php echo e(route('table.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name"><?php echo e(__('message.Table Name')); ?></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="number"><?php echo e(__('message.Number')); ?></label>
                            <input class="form-control" id="number" name="number" type="number" required/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="chairsNumber"><?php echo e(__('message.Chairs Number')); ?></label>
                            <input class="form-control" id="chairsNumber" type="number" name="chairsNumber" required/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="maxChairsNumber"><?php echo e(__('message.Max Chairs Number')); ?></label>
                            <input class="form-control" id="maxChairsNumber" type="number" name="maxChairsNumber" required/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="status"><?php echo e(__('message.Status')); ?></label>
                            <input class="form-control" id="status" type="number" name="status" required/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="branch"><?php echo e(__('message.Branch')); ?></label>
                            <select id="branch" class="custom-select"
                                name="branch_id" data-style="select-with-transition" title="Branch Name" data-size="7" required>
                                <?php if(isset($branches)): ?>
                                <option value="">Choose ...</option>
                                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="floor"><?php echo e(__('message.Floor')); ?></label>
                            <select id="floor" class="custom-select" 
                                name="floor_id" data-style="select-with-transition" title="Floor Nmae" data-size="7" required>
                                <?php if(isset($floors)): ?>
                                <option value="">Choose ...</option>
                                    <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($floor->id); ?>"><?php echo e($floor->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-fill btn-rose"><?php echo e(__('message.Submit')); ?></button>
                            </div>

                </form>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\tables\create.blade.php ENDPATH**/ ?>