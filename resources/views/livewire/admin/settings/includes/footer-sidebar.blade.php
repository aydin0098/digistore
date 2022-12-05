<ul class="folder-list">
    @can('setting-footer-label')
        <li class="{{request()->routeIs('admin.setting.footer.label') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.label')}}">برچسب ها </a></li>
    @endcan
    @can('setting-footer-social')
        <li class="{{request()->routeIs('admin.setting.footer.social') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.social')}}">شبکه های اجتماعی</a></li>
        @endcan
        @can('setting-footer-logo')
            <li class="{{request()->routeIs('admin.setting.footer.logo.index') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.logo.index')}}">لوگو های فوتر</a></li>
        @endcan
        @can('setting-footer-menu')
            <li class="{{request()->routeIs('admin.setting.footer.menu.index') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.menu.index')}}">منو های فوتر</a></li>
        @endcan
        @can('setting-footer-apps')
            <li class="{{request()->routeIs('admin.setting.footer.apps') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.apps')}}">نمادهای سایت</a></li>
        @endcan
</ul>
