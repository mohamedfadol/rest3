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
Add a Branch
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">Add a Branch</h4>
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
                <form method="POST" action="<?php echo e(route('branch.update' , $branch->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PUT')); ?>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">Branch name</label>
                            <input 
                                type="text" 
                                    name="name" 
                                        class="form-control" 
                                            id="name"
                                                value="<?php echo e($branch->name); ?>" 
                                                     
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="bmd-label-floating" for="address_address">Address</label>
                        <input 
                            type="text" 
                                id="address-input" 
                                    name="address_address" 
                                        class="form-control map-input"
                                            value="<?php echo e($branch->address_address); ?>"
                        >
                        <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                        <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                    </div>
                    <div id="address-map-container" style="width:100%;height:400px; ">
                        <div style="width: 100%; height: 100%" id="address-map"></div>
                    </div>

                    <div>Opening time:</div>

                    
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">Monday</div>
                                <label for="monday_from" class="col-form-label col-md-4">From</label>
                                <input 
                                    type="text"
                                        name="monday_from" 
                                            class="form-control timepicker col-md-4"
                                                value="<?php echo e($branch->monday_from); ?>" 
                                >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="monday_to" class="col-form-label col-md-4">To</label>
                                <input 
                                    type="text" 
                                        name="monday_to" 
                                            class="form-control timepicker col-md-4" 
                                                value="<?php echo e($branch->monday_to); ?>"  
                                >
                            </div>
                        </div>
                    </div>
                    
                    
                        
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">Tuesday</div>
                                <label for="tuesday_from" class="col-form-label col-md-4">From</label>
                                <input 
                                    type="text" 
                                        name="tuesday_from" 
                                            class="form-control timepicker col-md-4" 
                                                value="<?php echo e($branch->tuesday_from); ?>"
                                >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="tuesday_to" class="col-form-label col-md-4">To</label>
                                <input type="text" name="tuesday_to" class="form-control timepicker col-md-4" value="<?php echo e($branch->tuesday_to); ?>"
                                >
                            </div>
                        </div>
                    </div>
                    

                        
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">Wednesday</div>
                                <label for="wednesday_from" class="col-form-label col-md-4">From</label>
                                <input type="text" name="wednesday_from" class="form-control timepicker col-md-4" value="<?php echo e($branch->wednesday_from); ?>"
                                >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="wednesday_to" class="col-form-label col-md-4">To</label>
                                <input type="text" name="wednesday_to" class="form-control timepicker col-md-4" value="<?php echo e($branch->wednesday_to); ?>"
                                >
                            </div>
                        </div>
                    </div>
                    

                        
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">Thursday</div>
                                <label for="thursday_from" class="col-form-label col-md-4">From</label>
                                <input type="text" name="thursday_from" class="form-control timepicker col-md-4" value="<?php echo e($branch->thursday_from); ?>"
                                >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="thursday_to" class="col-form-label col-md-4">To</label>
                                <input type="text" name="thursday_to" class="form-control timepicker col-md-4" 
                                value="<?php echo e($branch->thursday_to); ?>"
                                >

                            </div>
                        </div>
                    </div>
                    

                        
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">Friday</div>
                                <label for="friday_from" class="col-form-label col-md-4">From</label>
                                <input type="text" name="friday_from" class="form-control timepicker col-md-4" value="<?php echo e($branch->friday_from); ?>" 
                                >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="friday_to" class="col-form-label col-md-4">To</label>
                                <input type="text" name="friday_to" class="form-control timepicker col-md-4" value="<?php echo e($branch->friday_to); ?>" >
                            </div>
                        </div>
                    </div>
                    

                        
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">Saturday</div>
                                <label for="saturday_from" class="col-form-label col-md-4">From</label>
                                <input type="text" name="saturday_from" class="form-control timepicker col-md-4" value="<?php echo e($branch->saturday_from); ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="saturday_to" class="col-form-label col-md-4">To</label>
                                <input type="text" name="saturday_to" class="form-control timepicker col-md-4" value="<?php echo e($branch->saturday_to); ?>">
                            </div>
                        </div>
                    </div>
                    

                        
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">Sunday</div>
                                <label for="sunday_from" class="col-form-label col-md-4">From</label>
                                <input type="text" name="sunday_from" class="form-control timepicker col-md-4" value="<?php echo e($branch->sunday_from); ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="sunday_to" class="col-form-label col-md-4">To</label>
                                <input type="text" name="sunday_to" class="form-control timepicker col-md-4" value="<?php echo e($branch->sunday_to); ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="<?php echo e($branch->phone); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label label-checkbox">Delivery Price</label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" onchange="handleDeliveryPrice()" 
                                        type="radio" 
                                            name="delivery_price" 
                                                value="dinamic" 
                                                    <?php echo e($branch->delivery_price == 'dinamic'? 'checked':''); ?>

                                                        > Open
                                        <span class="circle">
                                    <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" onchange="handleDeliveryPrice()" 
                                        type="radio" 
                                            name="delivery_price" 
                                                value="static"
                                                    <?php echo e($branch->delivery_price == 'static'? 'checked':''); ?>

                                                        > Pre
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <input 
                                type="text" 
                                    value="<?php echo e($branch->delivery_price); ?>" 
                                        class="form-control col-md-4" 
                                            id="static_delivery_price" 
                                                placeholder="Delivery Pre Price"
                                                    >
                        </div>
                    </div>

                   <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="phone">TAX</label>
                            <input 
                                type="text" 
                                    name="tax" 
                                        class="form-control" 
                                            id="tax" 
                                                value="<?php echo e($branch->tax); ?>"
                            >
                        </div>
                    </div>
                        <div class="card-footer ">
                            <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                            <button type="submit" class="btn btn-fill btn-rose">Submit and new</button>
                        </div>

                </form>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    ##parent-placeholder-cb5346a081dcf654061b7f897ea14d9b43140712##
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAPS_API_KEY')); ?>&libraries=places&callback=initialize" async defer></script>
    <script src="<?php echo asset('js/mapInput.js'); ?>"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="<?php echo asset('theme/js/plugins/bootstrap-datetimepicker.min.js'); ?>"></script>

    <script>
    $(document).ready(function() {
      // initialise Datetimepicker and Sliders
      md.initFormExtendedDatetimepickers();
      if ($('.slider').length != 0) {
        md.initSliders();
      }

      if ($('input[name=delivery_price]:checked').val() == 'static') {
            $('#static_delivery_price').slideDown();
            $('#static_delivery_price').attr('required','required');
        } else {
            $('#static_delivery_price').slideUp();
            $('#static_delivery_price').removeAttr('required'); 
        }
    });
    function handleDeliveryPrice()
    {
        if ($('input[name=delivery_price]:checked').val() == 'static') {
            $('#static_delivery_price').slideDown();
            $('#static_delivery_price').attr('required','required');
        } else {
            $('#static_delivery_price').slideUp();
            $('#static_delivery_price').removeAttr('required'); 
        }
    }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views/branches/edit.blade.php ENDPATH**/ ?>