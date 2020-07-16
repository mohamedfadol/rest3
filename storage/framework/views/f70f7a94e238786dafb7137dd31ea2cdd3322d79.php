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
<?php echo e(__('message.Edit a Printer')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Edit a Printer')); ?></h4>
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
                <form method="POST" action="<?php echo e(route('printer.update',$printer->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PUT')); ?> 
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name"><?php echo e(__('message.Printer Arabic Name')); ?></label>
                            <input type="text" 
                                        name="name" 
                                        value="<?php echo e($printer->name); ?>"
                                            class="form-control" 
                                                id="name" 
                                                    required
                                                    >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="enName"><?php echo e(__('message.Printer English Name')); ?></label>
                            <input type="text" 
                                        class="form-control" 
                                            name="enName" 
                                            value="<?php echo e($printer->enName); ?>"
                                                id="enName" 
                                                    required
                                                    >
                        </div>
                    </div>   

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="printer"><?php echo e(__('message.Printer')); ?></label>
                            <input type="text" 
                                        name="printer"
                                        value="<?php echo e($printer->printer); ?>" 
                                            class="form-control" 
                                                id="printer" 
                                                    required
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="printerName"><?php echo e(__('message.Printer Name')); ?></label>
                            <input type="text" 
                                        name="printerName" 
                                        value="<?php echo e($printer->printerName); ?>"
                                            class="form-control" 
                                                id="printerName" 
                                                    required
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="printerIndex"><?php echo e(__('message.Printer Index')); ?></label>
                            <input type="number" 
                                        name="printerIndex" 
                                        value="<?php echo e($printer->printerIndex); ?>"
                                            class="form-control" 
                                                id="printerIndex" 
                                                    required
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="copiesNumber"><?php echo e(__('message.Copies Number')); ?></label>
                            <input type="number" 
                                        name="copiesNumber" 
                                        value="<?php echo e($printer->copiesNumber); ?>"
                                            class="form-control" 
                                                id="copiesNumber" 
                                                    required
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note"><?php echo e(__('message.Notes')); ?></label>
                            <input type="text" 
                                        name="note" 
                                        value="<?php echo e($printer->note); ?>"
                                            class="form-control" 
                                                id="note" 
                                                    required
                                                    >
                        </div>
                    </div> 
                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="branch"><?php echo e(__('message.Branch')); ?></label>
                            <select id="modifires" class="custom-select" name="branch_id" data-style="select-with-transition" title="modifires" data-size="7">
                                <?php if(count($branches) > 0): ?>
                                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <option value="">Ther's No Branch To Add</option>
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

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\printer\edit.blade.php ENDPATH**/ ?>