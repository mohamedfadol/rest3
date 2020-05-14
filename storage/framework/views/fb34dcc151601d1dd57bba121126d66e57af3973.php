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
Register
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">Registeration Form</h4>
            </div>
            <div class="card-body ">
                <form method="#" action="#">
                    <div class="row">
                        <div class="form-group col-md-4 mt-4">
                            <label for="first_name" class="bmd-label-floating">First Name</label>
                            <input type="text" class="form-control" id="first_name">
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label for="middle_name" class="bmd-label-floating">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name">
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label for="last_name" class="bmd-label-floating">Last Name</label>
                            <input type="text" class="form-control" id="last_name">
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label for="phone" class="bmd-label-floating">Phone Number</label>
                        <input type="text" class="form-control" id="phone">
                    </div>

                    <div class="form-group mt-4">
                        <label for="email" class="bmd-label-floating">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    
                    <div class="form-group mt-4">
                        <label for="username" class="bmd-label-floating">Username</label>
                        <input type="text" class="form-control" id="username">
                    </div>
                    
                    <div class="form-group mt-4">
                        <label for="password" class="bmd-label-floating">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 mt-4">
                            <label for="country" class="bmd-label-floating">Country</label>
                            <select id="country" class="custom-select" name="country" data-style="select-with-transition" title="Country" data-size="7">
                                <option value="">Choose your country</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->en_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label for="state" class="bmd-label-floating">State</label>
                            <select id="state" class="custom-select" name="state" data-style="select-with-transition" title="State"
                                data-size="7">
                                <option disabled>Choose your country first</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label for="city" class="bmd-label-floating">City</label>
                            <select id="city" class="custom-select" name="city" data-style="select-with-transition" title="City"
                                data-size="7">
                                <option disabled>Choose your state first</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label for="business_name" class="bmd-label-floating">Business Name</label>
                        <input type="text" class="form-control" id="business_name">
                    </div>

                    <!-- <div class="form-group col-md-4 mt-4">
                        <label for="country" class="bmd-label-floating">Business type</label>
                        <select id="country" class="custom-select" name="country" data-style="select-with-transition" title="Country" data-size="7">
                            <option value="">Bakery</option>
                            <option value="">Food Truck</option>
                            <option value="">Pizzeria</option>
                            <option value="">Coffee Shop</option>
                            <option value="">Drive Thru</option>
                        </select>
                    </div> -->

                    <div class="row">
                        <div class="form-group col-md-4 mt-4">
                            <label for="number_of_branches" class="bmd-label-floating">Number of Branches</label>
                            <input type="number" class="form-control" id="number_of_branches" min="1">
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label for="number_of_employees" class="bmd-label-floating">Number of Employees</label>
                            <input type="number" class="form-control" id="number_of_employees" min="1">
                        </div>
                    </div>

                    <div class="row">
                      <label class="mr-4 col-form-label label-checkbox">Choose Servises you want to buy</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value=""> Restaurants Management System
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value=""> Accounting
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value=""> Human Resources Management System
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>

                    <hr style="width:50%">

                    <div class="form-check mt-4">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value=""> Subscribe to newsletter
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>

                    <div class="form-check mt-4">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value=""> I accept the agreements
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>
                </form>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-fill btn-rose">Submit</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    
    <script src="<?php echo asset('js/selectize.js'); ?>"></script>
    
    
    <!-- <script>
    $('#city').selectize();
    </script> -->

    <script>
        $('#country').on('change', e => {
            $('#state').empty()
            $('#city').empty()
            var selectedCountry = $("#country option:selected").val()
            if(selectedCountry == 0) {
                $('#state').append('<option value="">Select your country first</option>')
                $('#city').append('<option value="">Select your state first</option>')
            }else{
                $.ajax({
                    url: 'countries/' + selectedCountry + '/states',
                    success: data => {
                        $('#state').append('<option value="">Choose your state</option>')
                        $('#city').append('<option disabled>Choose your state first</option>')
                        data.states.forEach(state =>
                            $('#state').append('<option value="'+ state.id +'">' + state.en_name + '</option>')
                        )
                    }
                })
            }
        })

        $('#state').on('change', e => {
            $('#city').empty()
            var selectedState = $("#state option:selected").val()
            if(selectedState == 0) {
                $('#city').append('<option value="">Select your state first</option>')
            } else {
                $.ajax({
                    url: 'states/' + selectedState + '/cities',
                    success: data => {
                        data.cities.forEach(city =>
                            $('#city').append('<option value="'+ city.id +'">' + city.en_name + '</option>')
                        )
                    }
                })
            }
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\register.blade.php ENDPATH**/ ?>