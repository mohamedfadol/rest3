<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <div class="navbar-brand"><?php echo $__env->yieldContent('heading'); ?></div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
<!--             <form class="navbar-form">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form> -->
            <ul class="navbar-nav">
<!--                 <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <i class="material-icons">dashboard</i>
                        <p class="d-lg-none d-md-block">
                            Stats
                        </p>
                    </a>
                </li> -->


            
                <li class="nav-item dropdown">
                    <a class="nav-link btn btn-secondary btn-lg text-info " href="" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <?php echo e(__('message.Choose language')); ?>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="dropdown-item" rel="alternate" hreflang="<?php echo e($localeCode); ?>"
                                    href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                                        <?php echo e($properties['native']); ?> 
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                                <a class="dropdown-item" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            
                            <?php if(Route::has('register')): ?>
                               
                                    <a class="dropdown-item" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                               
                            <?php endif; ?>
                        <?php else: ?> 
                                <a  class="dropdown-item ">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <a class="dropdown-item" href="#">
                                Profile
                                </a>

                                <a class="dropdown-item" href="#">
                                Settings
                                </a>
                                
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\report\resources\views/theme/navbar.blade.php ENDPATH**/ ?>