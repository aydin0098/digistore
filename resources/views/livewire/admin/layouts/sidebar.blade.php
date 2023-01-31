<div class="ecaps-sidemenu-area">
    <!-- Desktop Logo -->
    <div class="ecaps-logo">
        <a href="{{route('home.index')}}"><img class="desktop-logo" src="{{asset('back/img/core-img/logo.png')}}"
                                               alt="لوگوی دسک تاپ"> <img class="small-logo"
                                                                         src="img/core-img/small-logo.png"
                                                                         alt="آرم موبایل"></a>
    </div>

    <!-- Side Nav -->
    <div class="ecaps-sidenav" id="ecapsSideNav">
        <!-- Side Menu Area -->
        <div class="side-menu-area">
            <!-- Sidebar Menu -->

            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="{{request()->routeIs('admin.index') ? 'active' : '' }}"><a
                            href="{{route('admin.index')}}"><i class="zmdi zmdi-view-dashboard"></i><span>داشبورد</span></a>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0)"><i class="fa fa-shopping-bag"></i> <span>محصولات</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu {{request()->routeIs(['admin.categories.index']) ? 'active' : '' }}">
                            @can('manage_categories')
                            <li><a style="color: {{request()->routeIs('admin.categories.index') ? '#54c6d0' : '' }}" href="{{route('admin.categories.index')}}">دسته بندی</a></li>
                            @endcan
{{--                            <li><a href="product-tags.html">برچسب</a></li>--}}
{{--                            <li><a href="products.html">لیست محصولات</a></li>--}}
{{--                            <li><a href="#">برندها</a></li>--}}
{{--                            <li><a href="#">رنگ ها</a></li>--}}
{{--                            <li><a href="#">گارانتی ها</a></li>--}}
{{--                            <li><a href="#">تنوع قیمت</a></li>--}}
{{--                            <li><a href="#">مشخصات محصولات-مقادیر</a></li>--}}
{{--                            <li><a href="#">پیشنهادات شگفت انگیز</a></li>--}}
                        </ul>
                    </li>
                    @can('manage_users')
                    <li class="treeview {{request()->routeIs(['admin.users.index','admin.users.create']) ? 'active' : '' }}">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-accounts-alt"></i> <span>کاربران</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a style="color: {{request()->routeIs('admin.users.index') ? '#54c6d0' : '' }}" href="{{route('admin.users.index')}}">لیست کاربران</a></li>
                            <li><a style="color: {{request()->routeIs('admin.users.create') ? '#54c6d0' : '' }}" href="{{route('admin.users.create')}}">افزودن کاربر</a></li>
                        </ul>
                    </li>
                    @endcan

                    @canany(['manage_roles','manage_permissions'])
                    <li class="treeview {{request()->routeIs('admin.roles.index')
                    || request()->routeIs('admin.permissions.index') ? 'active' : ''}}">
                        <a href="javascript:void(0)"><i class="fa fa-user-secret"></i> <span>سطوح دسترسی</span> <i
                                class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            @can('manage_roles')
                            <li><a style="color: {{request()->routeIs('admin.roles.index') ? '#54c6d0' : '' }}"
                                   href="{{route('admin.roles.index')}}">نقش ها</a></li>
                            @endcan
                            @can('manage_permissions')
                                <li><a style="color: {{request()->routeIs('admin.permissions.index') ? '#54c6d0' : '' }}"
                                   href="{{route('admin.permissions.index')}}">سطح دسترسی</a></li>
                                @endcan
                        </ul>
                    </li>
                    @endcanany

                    @can('manage_logs')
                    <li>
                        <a style="color: {{request()->routeIs('admin.logs') ? '#54c6d0' : '' }}"
                           href="{{route('admin.logs')}}">
                            <i class="zmdi zmdi-chart"></i><span>گزارشات سیستم</span></a>
                    </li>
                    @endcan

                    @can('site-settings')
                    <li class="treeview {{request()->routeIs('admin.setting.footer.label')
                    || request()->routeIs('admin.setting.footer.logo') || request()->routeIs('admin.setting.footer.social') ? 'active' : ''}} ">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-settings"></i> <span>تنظیمات</span> <i
                                class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <!-- تنظیمات فوتر-برچسب ها-تنظیمات عمومی(لوگو و ...) -  -->
                            @canany(['setting-footer-label','setting-footer-social','setting-footer-logo','setting-footer-menu','setting-footer-apps'])
                                <li><a style="color: {{request()->routeIs('admin.setting.footer.label')
                     || request()->routeIs('admin.setting.footer.logo') || request()->routeIs('admin.setting.footer.social') ? '#54c6d0' : ''}}" href="{{route('admin.setting.footer.label')}}">تنظیمات فوتر سایت</a></li>
                            @endcanany
                            <!-- استان و شهر و ... -  -->
                            @can('site-settings')
                            <li><a href="{{request()->url()}}">تنظیمات فروشگاه</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    {{-- <li class="treeview">
                        <a href="javascript:void(0)"><i class="fa fa-newspaper-o"></i> <span>مقالات</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="article-categories.html">دسته بندی</a></li>
                            <li><a href="article-tags.html">برچسب</a></li>
                            <li><a href="articles.html">لیست مقالات</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0)"><i class="fa fa-file-image-o"></i> <span>رسانه ها</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="banners.html">بنر ها</a></li>
                            <li><a href="sliders.html">اسلایدر ها</a></li>
                        </ul>
                    </li>

                    <li><a href="pages.html"><i class="zmdi zmdi-assignment"></i><span>صفحات</span></a></li>
                    <li><a href="menus.html"><i class="zmdi zmdi-menu"></i><span>منو ها</span></a></li>
                    <li><a href="comments.html"><i class="zmdi zmdi-comments"></i><span>نظرات</span></a></li>

                    <li class="treeview">
                        <a href="javascript:void(0)"><i class="fa fa-cube"></i> <span>فروشندگان</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="vendors.html">لیست فروشندگان</a></li>
                            <li><a href="#">افزودن فروشنده</a></li>
                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-file-text"></i> <span>جزییات فروشگاه</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#">آدرس ها</a></li>
                            <li><a href="#">آدرس های انبار</a></li>
                            <li><a href="#">زمان های ارسال</a></li>
                            <li><a href="#">اطلاع رسانی</a></li>
                            <li><a href="#">لیست عمومی</a></li>
                            <li><a href="#">کالاهای مورد علاقه</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="zmdi zmdi-rss"></i><span>خبرنامه</span></a></li>
                    <li><a href="#"><i class="fa fa-id-badge"></i><span>تبلیغات</span></a></li>
                    <li><a href="#"><i class="fa fa-credit-card"></i><span>تراکنش ها</span></a></li>
                    <li><a href="logs.html"><i class="zmdi zmdi-chart"></i><span>گزارشات سیستم</span></a></li>
                    <li class="treeview">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-card-giftcard"></i> <span>تخفیفات</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#">کد های تخفیف</a></li>
                            <li><a href="#">کارت های هدیه</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0)"><i class="fa fa-first-order"></i> <span>سفارشات</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#">تمام سفارشات</a></li>
                            <li><a href="#">در انتظار</a></li>
                            <li><a href="#">در حال پردازش</a></li>
                            <li><a href="#">تکمیل شده</a></li>
                            <li><a href="#">مرجوعی</a></li>
                            <li><a href="#">لغو شده</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-replay"></i> <span>مرجوعی ها</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#">جزییات مرجوعی</a></li>
                            <li><a href="#">دلایل مرجوعی</a></li>
                            <li><a href="#">مرجوعی های تائید شده</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-notifications"></i> <span>اطلاع رسانی ها</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#">ایمیلی</a></li>
                            <li><a href="#">پیامکی</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0)"><i class="fa fa-ticket"></i> <span>تیکت ها</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#">بسته شده</a></li>
                            <li><a href="#">در حال بررسی</a></li>
                            <li><a href="#">باز</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0)"><i class="fa fa-calculator"></i> <span>حسابداری</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#">فروش ها</a></li>
                            <li><a href="#">تسویه حساب ها</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0)"><i class="fa fa-cubes"></i> <span>انبارداری</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#">موجودی</a></li>
                        </ul>
                    </li> --}}


                    {{-- <li><a href="#"><i class="zmdi zmdi-cloud-done"></i><span>بکاپ گیری</span></a></li> --}}
                </ul>
            </nav>
        </div>
    </div>
</div>
