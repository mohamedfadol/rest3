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
            <li class="nav-item <?php echo e(request()->is('menus*') || request()->is('categories*') || request()->is('products*') || request()->is('ingredients*') || request()->is('modifires*') ? 'active' : ''); ?>">
                <a class="nav-link" data-toggle="collapse" href="#menu" aria-expanded="<?php echo e(request()->is('menus*') || request()->is('categories*') || request()->is('products*') || request()->is('ingredients*') || request()->is('modifires*') ? 'true' : 'false'); ?>">
                    <i class="material-icons">menu_book</i>
                    <p> <?php echo e(__('message.Menu')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo e(request()->is('menus*') || request()->is('categories*') || request()->is('products*') || request()->is('ingredients*') || request()->is('modifires*') ? 'show' : ''); ?>" id="menu">
                    <ul class="nav">
                        <li class="nav-item <?php echo e(request()->is('menus*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('menu.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">list</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Menu Display')); ?> </span>
                            </a>
                        </li>

                        <li class="nav-item <?php echo e(request()->is('categories*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('category.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">category</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Categories')); ?>  </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('classes*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('class.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">restaurant_menu</i></span>
                                <span class="sidebar-normal"> <?php echo e(__('message.Class Products')); ?> </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('products*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('product.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">restaurant_menu</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Products')); ?>  </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('ingredients*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('ingredient.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">kitchen</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Ingredients')); ?>  </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('modifires*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('modifire.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">power</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Modifiers')); ?>  </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#reports">
                    <i class="material-icons">pie_chart</i>
                    <p> <?php echo e(__('message.Reports')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="reports">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(route('reports.dailyOrders')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Daily Orders')); ?> </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(route('reports.productsSales')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Products Sales')); ?>  </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(route('reports.categoriesSales')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"> <?php echo e(__('message.Categories Sales')); ?> </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(route('reports.totalSales')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Total Sales')); ?>  </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(route('reports.ingredientsSales')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"> <?php echo e(__('message.Ingredients Sales')); ?> </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(route('reports.log')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Activity Log')); ?>  </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo e(request()->is('discounts*') || request()->is('giftcards*') ? 'active' : ''); ?>">
                <a class="nav-link" data-toggle="collapse" href="#promotions" aria-expanded="<?php echo e(request()->is('discounts*') || request()->is('giftcards*') ? 'true' : 'false'); ?>">
                    <i class="material-icons">library_add</i>
                    <p> <?php echo e(__('message.Promotions')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo e(request()->is('discounts*') || request()->is('giftcards*') ? 'show' : ''); ?>" id="promotions">
                    <ul class="nav">
                        <li class="nav-item <?php echo e(request()->is('discounts*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('payment.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">local_atm</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Payment')); ?> </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('discounts*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('discount.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">local_offer</i></span>
                                <span class="sidebar-normal"> <?php echo e(__('message.Discount')); ?> </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('giftcards*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('giftcard.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">card_giftcard</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Gift Cards')); ?>  </span>
                            </a>
                        </li>
                        <li class="nav-item disabled">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><i class="material-icons">event</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Timed Events')); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo e(request()->is('employees*') ? 'active' : ''); ?>">
                <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="<?php echo e(request()->is('employees*') ? 'true' : 'false'); ?>">
                    <i class="material-icons">person</i>
                    <p> <?php echo e(__('message.Employees And Permissions')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo e(request()->is('employees*') ? 'show' : ''); ?>" id="users">
                    <ul class="nav">
                        <li class="nav-item <?php echo e(request()->is('employees*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('employees.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">people_alt</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Employees')); ?>  </span>
                            </a>
                        </li>
                        <li class="nav-item disabled">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><i class="material-icons">supervised_user_circle</i></span>
                                <span class="sidebar-normal"> <?php echo e(__('message.User Groups')); ?> </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('customers*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('customer.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">people_alt</i></span>
                                <span class="sidebar-normal"> <?php echo e(__('message.Customers')); ?> </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo e(request()->is('branches*') || request()->is('floors*') ? 'active' : ''); ?>">
                <a class="nav-link" data-toggle="collapse" href="#branches" aria-expanded="<?php echo e(request()->is('branches*') || request()->is('floors*') ? 'true' : 'false'); ?>">
                    <i class="material-icons">restaurant</i>
                    <p> <?php echo e(__('message.Branches & Floors')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo e(request()->is('branches*') || request()->is('floors*') ? 'show' : ''); ?>" id="branches">
                    <ul class="nav">
                        <li class="nav-item <?php echo e(request()->is('branches*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('branch.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">restaurant</i></span>
                                <span class="sidebar-normal"> <?php echo e(__('message.Branches')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('floors*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('floor.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">local_cafe</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Floors')); ?> </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('tables*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('table.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">table_chart</i></span>
                                <span class="sidebar-normal"> <?php echo e(__('message.Tables')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('billKinds*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('billKind.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">table_chart</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Bill Kind')); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#devices_and_printers">
                    <i class="material-icons">widgets</i>
                    <p> <?php echo e(__('message.Devices & Printers')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="devices_and_printers">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><i class="material-icons">devices_other</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Devices')); ?>  </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#printers">
                                <span class="sidebar-mini"><i class="material-icons">print</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Printers')); ?>  <b class="caret"></b></span>
                            </a>
                            <div class="collapse" id="printers">
                                <ul class="nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="<?php echo e(route('printer.index')); ?>">
                                            <span class="sidebar-mini"><i class="material-icons">print</i></span>
                                            <span class="sidebar-normal"><?php echo e(__('message.Printers')); ?>  </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"><i class="material-icons">receipt</i></span>
                                            <span class="sidebar-normal"><?php echo e(__('message.Printers Template Receipt')); ?>  </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"><i class="material-icons">local_atm</i></span>
                                            <span class="sidebar-normal"><?php echo e(__('message.Cash Drawer')); ?>  </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>






            <li class="nav-item <?php echo e(request()->is('delevery*') || request()->is('delevery*') ? 'active' : ''); ?>">
                <a class="nav-link" data-toggle="collapse" href="#delevery" aria-expanded="<?php echo e(request()->is('delevery*') || request()->is('delevery*') ? 'true' : 'false'); ?>">
                    <i class="material-icons">library_add</i>
                    <p> <?php echo e(__('message.Deleveries')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo e(request()->is('showDelevery*') || request()->is('delevery*') ? 'show' : ''); ?>" id="delevery">
                    <ul class="nav">
                        <li class="nav-item <?php echo e(request()->is('showDelevery*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('delevery.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">local_atm</i></span>
                                <span class="sidebar-normal"> <?php echo e(__('message.Delevery')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('showDelevery*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('discount.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">local_offer</i></span>
                                <span class="sidebar-normal"><?php echo e(__('message.Discount')); ?>  </span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>





            <li class="nav-item disabled">
                <a class="nav-link" href="#">
                    <i class="material-icons">settings</i>
                    <p> <?php echo e(__('message.Settings')); ?>  </p>
                </a>
            </li>
        </ul>
    </div>
</div><?php /**PATH C:\xampp\htdocs\report\resources\views/theme/sidebar.blade.php ENDPATH**/ ?>