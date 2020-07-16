<?php $__env->startSection('head'); ?>
<style>
    .table thead tr th {
        font-size: 0.8rem;
        font-weight: bold;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Daily Orders Report')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Daily Orders Report')); ?></h4>
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
                <form method="POST" action="<?php echo e(route('reports.totalSales')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label" for="from"><?php echo e(__('message.From')); ?></label>
                            <input type="date" class="form-control mt-2" id="from" name="from" value="<?php echo e($request ? $request->from : Carbon\Carbon::now()->subMonth()->format('Y-m-d')); ?>" required>
                        </div>

                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label" for="to"><?php echo e(__('message.To')); ?></label>
                            <input type="date" class="form-control mt-2" id="to" name="to" value="<?php echo e($request ? $request->to : Carbon\Carbon::now()->format('Y-m-d')); ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 mt-4">
                            <label class="bmd-label" for="branch"><?php echo e(__('message.Branch')); ?></label>
                            <select id="branch" class="custom-select" name="branch">
                                <?php if(count($branches) > 0): ?>
                                    <option value="all">All</option>
                                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($branch->id); ?>" <?php echo e($request ? ($request->branch == $branch->id ? 'selected' : '') : ''); ?>><?php echo e($branch->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <option value="">Ther's No branches To Add</option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label for="floor" class="bmd-label-floating"><?php echo e(__('message.Floor')); ?></label>
                            <select id="floor" class="custom-select" name="floor" data-old="<?php echo e($request ? $request->floor : ''); ?>" title="floor" data-size="7">
                                <option value="all" <?php echo e($request ? ($request->floor == 'all' ? 'selected' : '') : ''); ?>>All</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label for="table" class="bmd-label-floating"><?php echo e(__('message.Table')); ?></label>
                            <select id="table" class="custom-select" name="table" title="table" data-old="<?php echo e($request ? $request->table : ''); ?>">
                                <option value="all">All</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 mt-6 row">
                            <label class="bmd-label-floating" for="employee"><?php echo e(__('message.Added By')); ?></label>
                            <select id="employee" class="custom-select" data-old="<?php echo e($request ? $request->employee : ''); ?>" name="employee">
                                <option value="all">All</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 mt-4 pt-1"><?php echo e(__('message.Payment Type')); ?></label>
                        <div class="col-sm-10 mt-4 checkbox-radios">
                             <?php if(!empty($paymentTypes)): ?> 
                                <?php $__currentLoopData = $paymentTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input payment_type" type="checkbox" name="payment_types[]" value="<?php echo e($type->id); ?>" <?php echo e($request ? (in_array($type->id, $request->payment_types) ? 'checked' : '') : 'checked'); ?>> <?php echo e($type->name); ?>

                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div> 
                    </div>

                    <div class="row">
                        <label class="col-sm-2 mt-4 pt-1"><?php echo e(__('message.Order Type')); ?></label>
                        <div class="col-sm-10 mt-4 checkbox-radios">
                            <?php $__currentLoopData = $orderTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input order_type" type="checkbox" name="order_types[]" value="<?php echo e($type->id); ?>" <?php echo e($request ? (in_array($type->id, $request->order_types) ? 'checked' : '') : 'checked'); ?>> <?php echo e($type->BillKindNameEnglish); ?>

                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                </form>
            </div>
        </div>

        <?php if($request): ?>
            <div id="results" class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Results</h4>
                </div>
                <div class="card-body ">
                    <table id="orders-table" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th><?php echo e(__('message.Date')); ?></th>
                                <th><?php echo e(__('message.From Orders')); ?></th>
                                <th><?php echo e(__('message.To Order')); ?></th>
                                <th><?php echo e(__('message.Number of Orders')); ?></th>
                                <th><?php echo e(__('message.Total')); ?></th>
                                <th><?php echo e(__('message.Discount')); ?></th>
                                <th><?php echo e(__('message.Extra')); ?></th>
                                <th><?php echo e(__('message.Tax')); ?></th>
                                <th><?php echo e(__('message.Final Total')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php ($totalOfFinalTotals = 0); ?>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php ($totalOfFinalTotals += $order->sum->total - $order->sum->discount + $order->sum->extra - $order->sum->tax); ?>
                                <tr>
                                    <td><?php echo e($date); ?></td>
                                    <td><?php echo e($order->min->number); ?></td>
                                    <td><?php echo e($order->max->number); ?></td>
                                    <td><?php echo e($order->count()); ?></td>
                                    <td><?php echo e(number_format($order->sum->total)); ?></td>
                                    <td><?php echo e($order->sum->discount); ?></td>
                                    <td><?php echo e($order->sum->extra); ?></td>
                                    <td><?php echo e($order->sum->tax); ?></td>
                                    <td><?php echo e(number_format($order->sum->total - $order->sum->discount + $order->sum->extra - $order->sum->tax)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="lead muted text-right m-4">Total: <?php echo e(number_format($totalOfFinalTotals)); ?></div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            $.ajax({
                url:handleBrancheChange(),
                success:function(){
                    handleFloorChange();
                }
            })
            
            $('.payment_type').click(function() {
                checked = $("input[name='payment_types[]']:checked").length;
                if(!checked) {
                    alert("You must check at least one payment type.");
                    return false;
                }
            });

            $('.order_type').click(function() {
                checked = $("input[name='order_types[]']:checked").length;
                if(!checked) {
                    alert("You must check at least one order type.");
                    return false;
                }
            });

            $('#orders-table').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                searchPlaceholder: "Search",
                }
            });  
        });

        $('#branch').on('change', e => {
            handleBrancheChange()
        })

        $('#floor').on('change', e => {
            handleFloorChange()
        })

        function handleBrancheChange() {
            $('#floor').empty()
            $('#floor').append('<option value="all">All</option>')
            $('#table').empty()
            $('#table').append('<option value="all">All</option>')
            $('#employee').empty()
            $('#employee').append('<option value="all">All</option>')
            var selectedBranch = $("#branch option:selected").val()
            if(selectedBranch != 0) {
                $.ajax({
                    url: 'branches/' + selectedBranch + '/floors',
                    success: data => {
                        data.floors.forEach(floor =>
                            (floor.id == $('#floor').data('old')) ? $('#floor').append('<option selected value="'+ floor.id +'">' + floor.name + '</option>') : $('#floor').append('<option value="'+ floor.id +'">' + floor.name + '</option>')
                        )
                    }
                })
                $.ajax({
                    url: 'branches/' + selectedBranch + '/employees',
                    success: data => {
                        data.employees.forEach(employee =>
                            (employee.id == $('#employee').data('old')) ? $('#employee').append('<option selected value="'+ employee.id +'">' + employee.name + '</option>') : $('#employee').append('<option value="'+ employee.id +'">' + employee.name + '</option>')
                        )
                    }
                })
            }
        }

        function handleFloorChange() {
            $('#table').empty()
            $('#table').append('<option value="all">All</option>')
            $('#employee').empty()
            $('#employee').append('<option value="all">All</option>')
            var selectedFloor = $("#floor option:selected").val()
            if(selectedFloor != 0) {
                $.ajax({
                    url: 'floors/' + selectedFloor + '/tables',
                    success: data => {
                        data.tables.forEach(table =>
                            ($('#table').data('old') == table.id) ? $('#table').append('<option selected value="'+ table.id +'">' + table.name + '</option>') : $('#table').append('<option value="'+ table.id +'">' + table.name + '</option>')
                        )
                    }
                })
                if(selectedFloor != 'all') {
                    $.ajax({
                        url: 'floors/' + selectedFloor + '/employees',
                        success: data => {
                            data.employees.forEach(employee =>
                                (employee.id == $('#employee').data('old')) ? $('#employee').append('<option selected value="'+ employee.id +'">' + employee.name + '</option>') : $('#employee').append('<option value="'+ employee.id +'">' + employee.name + '</option>')
                            )
                        }
                    })
                } else {
                    var selectedBranch = $("#branch option:selected").val()
                    $.ajax({
                        url: 'branches/' + selectedBranch + '/employees',
                        success: data => {
                            data.employees.forEach(employee =>
                                (employee.id == $('#employee').data('old')) ? $('#employee').append('<option selected value="'+ employee.id +'">' + employee.name + '</option>') : $('#employee').append('<option value="'+ employee.id +'">' + employee.name + '</option>')
                            )
                        }
                    })
                }
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\reports\total-sales.blade.php ENDPATH**/ ?>