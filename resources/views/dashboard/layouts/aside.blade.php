<<<<<<< HEAD
<!--begin::Aside-->
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto noprint" id="kt_aside">
    <li class="menu-item menu-item-active mt-10 mb-10 text-center" aria-haspopup="true">

        <a href="{{route('dashboard.index')}}">
            <img alt="Logo"  src="{{asset('assets/logo.png')}}" style="height:100px;width:90px;" />
        </a>

    </li>
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">



                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
										<span class="svg-icon menu-icon">
											<i class="flaticon2-protected"></i>
										</span>
										</span>
                        <span class="menu-text">المشرفون</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('dashboard.admins.index')}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">قائمه المشرفون</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('dashboard.admins.create')}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">اضافه المشرفون</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="menu-item menu-item" aria-haspopup="true">
                    <a href="{{route('dashboard.users.index')}}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <span class="svg-icon menu-icon">
                                    <i class="flaticon2-user-outline-symbol"></i>
                                </span>
                            </span>
                        <span class="menu-text">المستخدمين</span>
                    </a>
                </li>

                <li class="menu-item menu-item" aria-haspopup="true">
                    <a href="{{route('dashboard.providers.index')}}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <span class="svg-icon menu-icon">
                                    <i class="flaticon2-user-1"></i>
                                </span>
                            </span>
                        <span class="menu-text">مزودي الخدمه</span>
                    </a>
                </li>

                <li class="menu-item menu-item" aria-haspopup="true">
                    <a href="{{route('dashboard.orders.index')}}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <span class="svg-icon menu-icon">
                                    <i class="flaticon2-box"></i>
                                </span>
                            </span>
                        <span class="menu-text">الطلبات</span>
                    </a>
                </li>

                <li class="menu-item menu-item" aria-haspopup="true">
                    <a href="{{route('dashboard.offers.index')}}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <span class="svg-icon menu-icon">
                                    <i class="flaticon2-layers-2"></i>
                                </span>
                            </span>
                        <span class="menu-text">العروض</span>
                    </a>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
										<span class="svg-icon menu-icon">
											<i class="flaticon2-box-1"></i>
										</span>
										</span>
                        <span class="menu-text">الخدمات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('dashboard.services.index')}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">قائمه الخدمات</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('dashboard.services.create')}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">اضافه خدمة جديدة</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
										<span class="svg-icon menu-icon">
											<i class="fas fa-square"></i>
										</span>
										</span>
                        <span class="menu-text">الفئات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('dashboard.categories.index')}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">قائمه الفئات</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('dashboard.categories.create')}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">اضافه فئه جديده</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
										<span class="svg-icon menu-icon">
											<i class="flaticon2-layers"></i>
										</span>
										</span>
                        <span class="menu-text">الخصائص</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('dashboard.attributes.index')}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">قائمه الخصائص</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('dashboard.attributes.create')}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">اضافه خاصية جديدة</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
										<span class="svg-icon menu-icon">
											<i class="fa fa-credit-card"></i>
										</span>
										</span>
                        <span class="menu-text">طرق الدفع</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('dashboard.payment-methods.index')}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">قائمه طرق الدفع</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('dashboard.payment-methods.create')}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">اضافه طريقه دفع جديده</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a onclick="document.getElementById('logout-form').submit();" href="javascript:" class="menu-link menu-toggle">
                	<span class="svg-icon menu-icon">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                    </span>
                        <span class="menu-text">تسجيل الخروج</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>

                <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>


            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
<!--end::Aside-->

