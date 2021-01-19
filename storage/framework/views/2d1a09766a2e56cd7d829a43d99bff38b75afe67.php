<div class="sidebar" data-color="purple" data-background-color="white" data-image="<?php echo asset('theme/img/sidebar-1.jpg'); ?>">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
            <a href="https://www.aurages.com">
                <img src="<?php echo e(asset('theme/img/back-g/back-g.png')); ?>" alt="">
            </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="<?php echo asset('theme/img/faces/avatar.jpg'); ?>" />
            </div>
            <div class="user-info">
                <a href="#" class="username">
                    <span>
                        <?php echo e(Auth::user()->name); ?>

                    </span>
                </a>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#reports">
                    <i class="material-icons">pie_chart</i>
                    <p> <?php echo e(__('message.Reports')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="reports">
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo e(route('BillsDaily')); ?>">
                    <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                    <span class="sidebar-normal"><?php echo e(__('message.Daily Bills')); ?> </span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo e(route('BillsNumForEachBranch')); ?>">
                    <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                    <span class="sidebar-normal"><?php echo e(__('message.Bills Number')); ?>  </span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo e(route('ReportsSales')); ?>">
                    <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                    <span class="sidebar-normal"> <?php echo e(__('message.Report Sales')); ?> </span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo e(route('RepSalMats')); ?>">
                    <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                    <span class="sidebar-normal"><?php echo e(__('message.Materials Sales')); ?>  </span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo e(route('DetailesSalse')); ?>">
                    <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                    <span class="sidebar-normal"> <?php echo e(__('message.Details Sales')); ?> </span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo e(route('sellingMoreItems')); ?>">
                    <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                    <span class="sidebar-normal"> <?php echo e(__('message.More Sales')); ?> </span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo e(route('sellingLesseItems')); ?>">
                    <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                    <span class="sidebar-normal"> <?php echo e(__('message.Less Sales')); ?> </span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo e(route('matsElementConsuming')); ?>">
                    <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                    <span class="sidebar-normal"> <?php echo e(__('message.Consuming materials Sales')); ?> </span>
                </a>
            </li>

        </ul>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\rest3\resources\views/theme/sidebar.blade.php ENDPATH**/ ?>