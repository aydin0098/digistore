<ul class="folder-list">
    <li class="{{request()->routeIs('admin.setting.footer.label') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.label')}}">برچسب ها </a></li>
    <li class="{{request()->routeIs('admin.setting.footer.social') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.social')}}">شبکه های اجتماعی</a></li>
    <li class="{{request()->routeIs('admin.setting.footer.logo.index') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.logo.index')}}">لوگو های فوتر</a></li>
    <li class="{{request()->routeIs('admin.setting.footer.menu.index') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.menu.index')}}">منو های فوتر</a></li>
    <li class="{{request()->routeIs('admin.setting.footer.apps') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.apps')}}">نمادهای سایت</a></li>
</ul>
