<?php $__env->startSection('heading'); ?>
Gift Cards
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<style>
    .table thead tr th {
        font-size: 0.8rem;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="<?php echo e(route('giftcard.create')); ?>"><i class="material-icons">add</i> Add New Gift Card</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">card_giftcard</i>
                </div>
                <h4 class="card-title">Gift Cards</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="giftcards-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Valid From</th>
                                <th>Valid To</th>
                                <th>Number of Coupons</th>
                                <th>Valid On</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>

                    <?php if(count($giftcards) > 0 ): ?>
                        <tbody>
                        <?php $__currentLoopData = $giftcards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $giftcard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($giftcard->name); ?></td>
                            <td><?php echo e($giftcard->type); ?></td>
                            <td><?php echo e($giftcard->amount); ?></td>
                            <td><?php echo e($giftcard->ValidFrom); ?></td>
                            <td><?php echo e($giftcard->validTo); ?></td>
                            <td><?php echo e($giftcard->couponNumber); ?></td>
                            <td><?php echo e($giftcard->validOn); ?></td>
                            <td class="text-right">
                                <a href="<?php echo e(route('giftcard.edit' ,$giftcard->id)); ?>" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">edit</i></a>
                                <a href="<?php echo e(route('giftcard.destroy' ,$giftcard->id)); ?>" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $('#giftcards-table').DataTable({
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
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\giftcards\index.blade.php ENDPATH**/ ?>