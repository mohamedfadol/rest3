<div class="sidebar" data-color="purple" data-background-color="white" data-image="{!! asset('theme/img/sidebar-1.jpg') !!}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
            <a href="https://www.aurages.com">
                <img src="{{asset('theme/img/back-g/back-g.png')}}" alt="">
            </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{!! asset('theme/img/faces/avatar.jpg') !!}" />
            </div>
            <div class="user-info">
                <a href="#" class="username">
                    <span>
                        {{Auth::user()->name}}
                    </span>
                </a>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item {{ request()->is('menus*') || request()->is('categories*') || request()->is('products*') || request()->is('ingredients*') || request()->is('modifires*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#menu" aria-expanded="{{ request()->is('menus*') || request()->is('categories*') || request()->is('products*') || request()->is('ingredients*') || request()->is('modifires*') ? 'true' : 'false' }}">
                    <i class="material-icons">menu_book</i>
                    <p> {{ __('message.Menu') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ request()->is('menus*') || request()->is('categories*') || request()->is('products*') || request()->is('ingredients*') || request()->is('modifires*') ? 'show' : '' }}" id="menu">
                    <ul class="nav">
                        <li class="nav-item {{ request()->is('menus*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('menu.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">list</i></span>
                                <span class="sidebar-normal">{{ __('message.Menu Display') }} </span>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('categories*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('category.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">category</i></span>
                                <span class="sidebar-normal">{{ __('message.Categories') }}  </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('classes*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('class.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">restaurant_menu</i></span>
                                <span class="sidebar-normal"> {{ __('message.Class Products') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('products*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('product.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">restaurant_menu</i></span>
                                <span class="sidebar-normal">{{ __('message.Products') }}  </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('ingredients*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('ingredient.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">kitchen</i></span>
                                <span class="sidebar-normal">{{ __('message.Ingredients') }}  </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('modifires*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('modifire.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">power</i></span>
                                <span class="sidebar-normal">{{ __('message.Modifiers') }}  </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('orders*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('orders.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">power</i></span>
                                <span class="sidebar-normal">{{ __('message.Orders') }}  </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#reports">
                    <i class="material-icons">pie_chart</i>
                    <p> {{ __('message.Reports') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="reports">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('reports.dailyOrders') }}">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal">{{ __('message.Daily Orders') }} </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('reports.productsSales') }}">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal">{{ __('message.Products Sales') }}  </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('reports.categoriesSales') }}">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"> {{ __('message.Categories Sales') }} </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('reports.totalSales') }}">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal">{{ __('message.Total Sales') }}  </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('reports.ingredientsSales') }}">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"> {{ __('message.Ingredients Sales') }} </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('reports.log') }}">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal">{{ __('message.Activity Log') }}  </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ request()->is('discounts*') || request()->is('giftcards*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#promotions" aria-expanded="{{ request()->is('discounts*') || request()->is('giftcards*') ? 'true' : 'false' }}">
                    <i class="material-icons">library_add</i>
                    <p> {{ __('message.Promotions') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ request()->is('discounts*') || request()->is('giftcards*') ? 'show' : '' }}" id="promotions">
                    <ul class="nav">
                        <li class="nav-item {{ request()->is('discounts*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('payment.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">local_atm</i></span>
                                <span class="sidebar-normal">{{ __('message.Payment') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('discounts*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('discount.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">local_offer</i></span>
                                <span class="sidebar-normal"> {{ __('message.Discount') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('giftcards*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('giftcard.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">card_giftcard</i></span>
                                <span class="sidebar-normal">{{ __('message.Gift Cards') }}  </span>
                            </a>
                        </li>
                        <li class="nav-item disabled">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><i class="material-icons">event</i></span>
                                <span class="sidebar-normal">{{ __('message.Timed Events') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ request()->is('employees*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="{{ request()->is('employees*') ? 'true' : 'false' }}">
                    <i class="material-icons">person</i>
                    <p> {{ __('message.Employees And Permissions') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ request()->is('employees*') ? 'show' : '' }}" id="users">
                    <ul class="nav">
                        <li class="nav-item {{ request()->is('employees*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('employees.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">people_alt</i></span>
                                <span class="sidebar-normal">{{ __('message.Employees') }}  </span>
                            </a>
                        </li>
                        <li class="nav-item disabled">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><i class="material-icons">supervised_user_circle</i></span>
                                <span class="sidebar-normal"> {{ __('message.User Groups') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('customers*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('customer.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">people_alt</i></span>
                                <span class="sidebar-normal"> {{ __('message.Customers') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ request()->is('branches*') || request()->is('floors*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#branches" aria-expanded="{{ request()->is('branches*') || request()->is('floors*') ? 'true' : 'false' }}">
                    <i class="material-icons">restaurant</i>
                    <p> {{ __('message.Branches & Floors') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ request()->is('branches*') || request()->is('floors*') ? 'show' : '' }}" id="branches">
                    <ul class="nav">
                        <li class="nav-item {{ request()->is('branches*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('branch.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">restaurant</i></span>
                                <span class="sidebar-normal"> {{ __('message.Branches') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('floors*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('floor.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">local_cafe</i></span>
                                <span class="sidebar-normal">{{ __('message.Floors') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('tables*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('table.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">table_chart</i></span>
                                <span class="sidebar-normal"> {{ __('message.Tables') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('billKinds*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('billKind.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">table_chart</i></span>
                                <span class="sidebar-normal">{{ __('message.Bill Kind') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#devices_and_printers">
                    <i class="material-icons">widgets</i>
                    <p> {{ __('message.Devices & Printers') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="devices_and_printers">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><i class="material-icons">devices_other</i></span>
                                <span class="sidebar-normal">{{ __('message.Devices') }}  </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#printers">
                                <span class="sidebar-mini"><i class="material-icons">print</i></span>
                                <span class="sidebar-normal">{{ __('message.Printers') }}  <b class="caret"></b></span>
                            </a>
                            <div class="collapse" id="printers">
                                <ul class="nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('printer.index') }}">
                                            <span class="sidebar-mini"><i class="material-icons">print</i></span>
                                            <span class="sidebar-normal">{{ __('message.Printers') }}  </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"><i class="material-icons">receipt</i></span>
                                            <span class="sidebar-normal">{{ __('message.Printers Template Receipt') }}  </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"><i class="material-icons">local_atm</i></span>
                                            <span class="sidebar-normal">{{ __('message.Cash Drawer') }}  </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>






            <li class="nav-item {{ request()->is('delevery*') || request()->is('delevery*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#delevery" aria-expanded="{{ request()->is('delevery*') || request()->is('delevery*') ? 'true' : 'false' }}">
                    <i class="material-icons">library_add</i>
                    <p> {{ __('message.Deleveries') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ request()->is('showDelevery*') || request()->is('delevery*') ? 'show' : '' }}" id="delevery">
                    <ul class="nav">
                        <li class="nav-item {{ request()->is('showDelevery*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('delevery.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">local_atm</i></span>
                                <span class="sidebar-normal"> {{ __('message.Delevery') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('showDelevery*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('discount.index') }}">
                                <span class="sidebar-mini"><i class="material-icons">local_offer</i></span>
                                <span class="sidebar-normal">{{ __('message.Discount') }}  </span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>





            <li class="nav-item disabled">
                <a class="nav-link" href="#">
                    <i class="material-icons">settings</i>
                    <p> {{ __('message.Settings') }}  </p>
                </a>
            </li>
        </ul>
    </div>
</div>